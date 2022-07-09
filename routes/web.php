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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('product-list');
Route::get('/products/show/{id}', [App\Http\Controllers\ProductsController::class, 'show'])->name('product-show');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart-show');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order-list');
Route::get('/orders/show/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order-show');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');