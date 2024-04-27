<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //
    public function showByCategory($category)
    {
        // Keresés a termékek között a megadott kategória alapján
        $products = Product::where('category', $category)->get();
        
        // Visszaadás a megfelelő nézetnek, például 'products.blade.php'
        return view('products')->with('products', $products);
    }

    public function showDetails($id)
    {
        $product = Product::find($id);
        return view('product.details', ['product' => $product]);
    }
}
