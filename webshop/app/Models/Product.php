<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category','description', 'price', 'image',];

    public function index()
{
  
    $products = Product::orderBy('price')->get();

    return view('home')->with('products', $products);
}
}
