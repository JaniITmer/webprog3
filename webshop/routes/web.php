<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    
    return view('welcome');
});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);
Auth::routes();




Route::get('/cart', [CartController::class, 'mutat'])->middleware('auth')->name('cart.mutat');
Route::post('/hozzaad', [CartController::class, 'hozzaad'])->name('cart.hozzaad');
Route::get('/products/category/{category}', [ProductController::class, 'showByCategory'])->name('products.category');
Route::get('/products/{id}', [ProductController::class, 'showDetails'])->name('product.details');