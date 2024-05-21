<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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
Route::delete('/cart/delete', [CartController::class, 'delete'])->name('cart.delete');

Route::get('/order', [OrderController::class, 'showOrderForm'])->name('order.form')->middleware('auth');
Route::post('/order', [OrderController::class, 'submitOrder'])->name('order.submit')->middleware('auth');
Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
Route::put('/cart/update', [CartController::class, 'update'])->name('cart.update');