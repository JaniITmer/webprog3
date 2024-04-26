<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    
    return view('welcome');
});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [HomeController::class, 'index']);
Auth::routes();




Route::get('/cart', [CartController::class, 'mutat'])->middleware('auth')->name('cart.mutat');
Route::post('/hozzaad', [CartController::class, 'hozzaad'])->name('cart.hozzaad');