<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','category','description', 'price', ];

    public function index()
{
    // Ár szerint rendezve kérjük le a termékeket
    $products = Product::orderBy('price')->get();

    return view('home')->with('products', $products);
}
}
