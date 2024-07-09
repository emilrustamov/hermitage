<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductBrand;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.products.index', compact('products'));
    }

    public function indexCategory()
    {
        $categories = ProductCategory::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.products.index_categories', compact('categories'));
    }

    public function indexBrand()
    {
        $brands = ProductBrand::query()->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.products.index_brands', compact('brands'));
    }

    public function publicIndex(Request $request)
    {
        $query = Product::query();

        // Фильтрация по категории
        if ($request->has('category_id') && $request->category_id != 'all') {
            $query->where('category_id', $request->category_id);
        }

        // Фильтрация по бренду
        if ($request->has('brand_id') && $request->brand_id != 'all') {
            $query->where('brand_id', $request->brand_id);
        }

        // Сортировка
        if ($request->has('sort_by')) {
            if ($request->sort_by == 'title') {
                $query->orderBy('title_ru', 'asc');
            } elseif ($request->sort_by == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort_by == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(20);
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();

        return view('products', compact('products', 'categories', 'brands'));
    }


    public function createCategory()
    {
        return view('admin.products.create_category');
    }

    public function createBrand()
    {
        return view('admin.products.create_brands');
    }

    public function createProduct()
    {
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        return view('admin.products.create_product', compact('categories', 'brands'));
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        ProductCategory::create([
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_tk' => $request->title_tk,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.products.categories.index')->with('success', 'Category created successfully.');
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        ProductBrand::create([
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'title_tk' => $request->title_tk,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('admin.products.brands.index')->with('success', 'Brand created successfully.');
    }

    public function storeProduct(Request $request)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:product_brands,id',
        ]);

        $product = new Product();
        $product->title_ru = $request->title_ru;
        $product->title_en = $request->title_en;
        $product->title_tk = $request->title_tk;
        $product->image = $request->image;
        $product->order = $request->order;
        $product->is_active = $request->has('is_active');
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }

    public function editCategory($id)
    {
        $category = ProductCategory::findOrFail($id);
        return view('admin.products.edit_category', compact('category'));
    }

    public function editBrand($id)
    {
        $brand = ProductBrand::findOrFail($id);
        return view('admin.products.edit_brands', compact('brand'));
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);
        $categories = ProductCategory::all();
        $brands = ProductBrand::all();
        return view('admin.products.edit_product', compact('product', 'categories', 'brands'));
    }

    public function updateCategory(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $category = ProductCategory::findOrFail($id);
        $category->title_ru = $request->title_ru;
        $category->title_en = $request->title_en;
        $category->title_tk = $request->title_tk;
        $category->is_active = $request->has('is_active');

        $category->save();

        return redirect()->route('admin.products.categories.index')->with('success', 'Category updated successfully.');
    }

    public function updateBrand(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'is_active' => 'boolean',
        ]);

        $brand = ProductBrand::findOrFail($id);
        $brand->title_ru = $request->title_ru;
        $brand->title_en = $request->title_en;
        $brand->title_tk = $request->title_tk;
        $brand->is_active = $request->has('is_active');

        $brand->save();

        return redirect()->route('admin.products.brands.index')->with('success', 'Brand updated successfully.');
    }

    public function updateProduct(Request $request, $id)
    {
        $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_tk' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'is_active' => 'boolean',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:product_categories,id',
            'brand_id' => 'required|exists:product_brands,id',
        ]);

        $product = Product::findOrFail($id);
        $product->title_ru = $request->title_ru;
        $product->title_en = $request->title_en;
        $product->title_tk = $request->title_tk;
        $product->image = $request->image;
        $product->order = $request->order;
        $product->is_active = $request->has('is_active');
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function destroyCategory($id)
    {
        $category = ProductCategory::findOrFail($id);

        if ($category->products()->count() > 0) {
            return redirect()->route('admin.products.categories.index')->withErrors('Невозможно удалить категорию, так как к ней привязаны товары.');
        }

        $category->delete();

        return redirect()->route('admin.products.index_categories')->with('success', 'Категория успешно удалена.');
    }

    public function destroyBrand($id)
    {
        $brand = ProductBrand::findOrFail($id);

        if ($brand->products()->count() > 0) {
            return redirect()->route('admin.products.brands')->withErrors('Невозможно удалить бренд, так как к нему привязаны товары.');
        }

        $brand->delete();

        return redirect()->route('admin.products.index_brands')->with('success', 'Бренд успешно удален.');
    }

    public function destroyProduct($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
