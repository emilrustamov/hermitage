<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\PartnerCategory;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{

    public function index()
    {
        $partners = Partner::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.partners.index', compact('partners'));
    }
    public function test()
    {
        return view('partners');
    }


    public function indexCategory()
    {
        $categories = PartnerCategory::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.partners.index_categories', compact('categories'));
    }


    public function createCategory()
    {
        return view('admin.partners.create_category');
    }


    public function storeCategory(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',

        ]);


        PartnerCategory::create([
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_tk' => $request->title_tk,
            'is_active' => true,
        ]);

        return redirect()->route('admin.partners.categories.index')->with('success', 'Категория успешно создана.');
    }

    public function createPartner()
    {
        $categories = PartnerCategory::all();
        return view('admin.partners.create_partner', compact('categories'));
    }


    public function storePartner(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:partner_categories,id',
            'ordering' => 'required|integer',
            'image' => 'nullable|string|max:255',
        ]);

        $partner = new Partner();
        $partner->title = $request->title;
        $partner->category_id = $request->category_id;
        $partner->ordering = $request->ordering;
        $partner->image = $request->image;
        $partner->is_active = $request->has('is_active');

        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Партнер успешно создан.');
    }


    public function editCategory($id)
    {
        $category = PartnerCategory::findOrFail($id);
        return view('admin.partners.edit_category', compact('category'));
    }


    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',

        ]);

        $category = PartnerCategory::findOrFail($id);
        $category->title_ru = $request->title_ru;
        $category->title_en = $request->title_en;
        $category->title_tk = $request->title_tk;
        $category->is_active = $request->has('is_active');

        $category->save();

        return redirect()->route('admin.partners.categories.index')->with('success', 'Категория успешно обновлена.');
    }


    public function editPartner($id)
    {
        $partner = Partner::findOrFail($id);
        $categories = PartnerCategory::all();
        return view('admin.partners.edit_partner', compact('partner', 'categories'));
    }

    public function updatePartner(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:partner_categories,id',
            'ordering' => 'required|integer',
            'image' => 'nullable|string|max:255',
        ]);

        $partner = Partner::findOrFail($id);
        $partner->title = $request->title;
        $partner->category_id = $request->category_id;
        $partner->ordering = $request->ordering;
        $partner->image = $request->image;
        $partner->is_active = $request->has('is_active');

        $partner->save();

        return redirect()->route('admin.partners.index')->with('success', 'Партнер успешно обновлен.');
    }

    public function destroyCategory($id)
    {
        $category = PartnerCategory::findOrFail($id);

        if ($category->partners()->count() > 0) {
            return redirect()->route('admin.partners.categories.index')->withErrors('Невозможно удалить категорию, так как к ней привязаны партнеры.');
        }

        $category->delete();

        return redirect()->route('admin.partners.categories.index')->with('success', 'Категория успешно удалена.');
    }

    public function destroyPartner($id)
    {
        $partner = Partner::findOrFail($id);

        if ($partner->image) {
            Storage::disk('public')->delete($partner->image);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')->with('success', 'Партнер успешно удален.');
    }


    public function showPartners(Request $request)
    {
        $category_id = $request->input('category_id');
        $query = Partner::query();

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        $partners = $query->orderBy('ordering', 'asc')->get();
        $categories = PartnerCategory::all();

        return view('partners', compact('partners', 'categories', 'category_id'));
    }
}
