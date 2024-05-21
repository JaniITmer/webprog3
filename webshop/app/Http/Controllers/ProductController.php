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

    public function delete(Request $request)
{
    $numToDelete = $request->input('numToDelete');

    if (is_numeric($numToDelete) && $numToDelete > 0) {
        Product::orderBy('created_at', 'desc')->take($numToDelete)->delete();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Hibás adat.']);
}
}
