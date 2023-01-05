<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/aboutus', [App\Http\Controllers\AboutusController::class, 'index'])->name('aboutus');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');

Route::post('/cart', 'App\Http\Controllers\CartController@store');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/home/beanies', [App\Http\Controllers\ProductsController::class, 'beanies'])->name('beanies');

Route::get('/home/hoodies', [App\Http\Controllers\ProductsController::class, 'hoodies'])->name('hoodies');

Route::get('/home/socks', [App\Http\Controllers\ProductsController::class, 'socks'])->name('socks');