<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DirectionsCategory;
use App\Models\DirectionsItem;
use Illuminate\Support\Facades\Storage;

class DirectionsController extends Controller
{
    public function indexCategory()
    {
        $categories = DirectionsCategory::orderBy('ordering')->paginate(20);
        return view('admin.directions.index_categories', compact('categories'));
    }
    public function index()
    {
        $categories = DirectionsCategory::where('is_active', true)->orderBy('ordering')->get();
        return view('home', compact('categories'));
    }

    public function showCategory($locale, $id)
    {
        $category = DirectionsCategory::with('items')->findOrFail($id);
        return view('category.show', compact('category'));
    }

    public function createCategory()
    {
        return view('admin.directions.create_category');
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tk' => 'required|string',
            'ordering' => 'required|integer',
        ]);

        DirectionsCategory::create([
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_tk' => $request->title_tk,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_tk' => $request->description_tk,
            'main_image' => $request->main_image,
            'is_active' => $request->has('is_active'),
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.directions.categories.index')->with('success', 'Категория успешно создана.');
    }

    public function editCategory($id)
    {
        $category = DirectionsCategory::findOrFail($id);
        return view('admin.directions.edit_category', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tk' => 'required|string',
            'ordering' => 'required|integer',
        ]);

        $category = DirectionsCategory::findOrFail($id);
        $category->update([
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_tk' => $request->title_tk,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_tk' => $request->description_tk,
            'main_image' => $request->main_image,
            'is_active' => $request->has('is_active'),
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.directions.categories.index')->with('success', 'Категория успешно обновлена.');
    }

    public function destroyCategory($id)
    {
        $category = DirectionsCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.directions.categories.index')->with('success', 'Категория успешно удалена.');
    }

    public function indexItem()
    {
        $items = DirectionsItem::orderBy('ordering')->paginate(20);
        return view('admin.directions.index_items', compact('items'));
    }

    public function createItem()
    {
        $categories = DirectionsCategory::all();
        return view('admin.directions.create_item', compact('categories'));
    }

    public function storeItem(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:directions_categories,id',
            'poster_img' => 'nullable|string|max:255',
            'partner_logo' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'images' => 'nullable|string',
            'videos' => 'nullable|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tk' => 'required|string',
            'ordering' => 'required|integer',
        ]);

        $images = $request->images ? explode(',', $request->images) : [];
        $videos = $request->videos ? explode(',', $request->videos) : [];

        DirectionsItem::create([
            'category_id' => $request->category_id,
            'poster_img' => $request->poster_img,
            'partner_logo' => $request->partner_logo,
            'link' => $request->link,
            'images' => json_encode($images),
            'videos' => json_encode($videos),
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_tk' => $request->description_tk,
            'is_active' => $request->has('is_active'),
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.directions.items.index')->with('success', 'Элемент успешно создан.');
    }

    public function editItem($id)
    {
        $item = DirectionsItem::findOrFail($id);
        $categories = DirectionsCategory::all();
        return view('admin.directions.edit_item', compact('item', 'categories'));
    }

    public function updateItem(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:directions_categories,id',
            'poster_img' => 'nullable|string|max:255',
            'partner_logo' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'images' => 'nullable|string',
            'videos' => 'nullable|string',
            'description_ru' => 'required|string',
            'description_en' => 'required|string',
            'description_tk' => 'required|string',
            'ordering' => 'required|integer',
        ]);

        $images = $request->images ? explode(',', $request->images) : [];
        $videos = $request->videos ? explode(',', $request->videos) : [];

        $item = DirectionsItem::findOrFail($id);
        $item->update([
            'category_id' => $request->category_id,
            'poster_img' => $request->poster_img,
            'partner_logo' => $request->partner_logo,
            'link' => $request->link,
            'images' => json_encode($images),
            'videos' => json_encode($videos),
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'description_tk' => $request->description_tk,
            'is_active' => $request->has('is_active'),
            'ordering' => $request->ordering,
        ]);

        return redirect()->route('admin.directions.items.index')->with('success', 'Элемент успешно обновлен.');
    }

    public function destroyItem($id)
    {
        $item = DirectionsItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.directions.items.index')->with('success', 'Элемент успешно удален.');
    }
}
