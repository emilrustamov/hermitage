<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $locale = app()->getLocale();
    
        // Выполнение поиска по нужному полю в зависимости от текущей локали
        $products = Product::where("title_{$locale}", 'like', "%{$query}%")
            ->paginate(10);
    
        return view('searchresults', compact('products', 'query'));
    }
    
}
