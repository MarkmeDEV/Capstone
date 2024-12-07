<?php

use App\Http\Controllers\AdminDashboard;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::POST('/products/rating', [App\Http\Controllers\ProductsController::class, 'rate'])->name('product-rate');

Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart-show');
Route::post('/cart/product/delete/{id}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart-product-destroy');
Route::post('/cart/product/store/{id}', [App\Http\Controllers\CartController::class, 'store'])->name('cart-product-store');

Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('order-list');
Route::get('/orders/show/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order-show');
Route::POST('/orders/store/{id}', [App\Http\Controllers\OrderController::class, 'store'])->name('order-store');
Route::POST('/orders/destroy/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('order-destroy');
Route::POST('/orders/payment/{id}', [App\Http\Controllers\OrderController::class, 'payment'])->name('order-payment');

Route::get('/orders/all', [App\Http\Controllers\AdminOrderController::class, 'index'])->name('staff-order-list');
Route::get('/order/show/{id}', [App\Http\Controllers\AdminOrderController::class, 'show'])->name('staff-order-show');
Route::POST('/order/update/status/{id}', [App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('staff-order-update-status');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
Route::post('/profile/{id}', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile-update');

Route::POST('/user/profile', [App\Http\Controllers\UserController::class, 'store'])->name('store-user-information');
Route::POST('/users/register', [App\Http\Controllers\UserController::class, 'register'])->name('register-user-information');
Route::GET('/users', [App\Http\Controllers\UserController::class, 'index'])->name('user-list');
Route::GET('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('user-create');
Route::POST('/users/delete/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user-delete');
Route::GET('/users/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('user-show');

Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory-list');
Route::get('/inventory/product/create', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventory-create');
Route::POST('/inventory/product/store', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory-store');
Route::GET('/inventory/product/show/{id}', [App\Http\Controllers\InventoryController::class, 'show'])->name('inventory-show');
Route::POST('/inventory/product/destroy/{id}', [App\Http\Controllers\InventoryController::class, 'destroy'])->name('inventory-destroy');

Route::GET('/dashboard', [AdminDashboard::class, 'index'])->name('admin-dashboard');

use App\Http\Controllers\HomeController;

Route::get('/products/filter', [HomeController::class, 'index'])->name('products.filter');
// Route::get('/products', [App\Http\Controllers\ProductsController::class, 'index'])->name('products.index');




