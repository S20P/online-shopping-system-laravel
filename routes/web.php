<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Front\ProductController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\Front\CategoryController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

   		 
 Route::get('/product/{slug}',[ProductController::class,'findProductBySlug'])->name('product.show');
 Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');

Route::get('/cart', [CartController::class,'cartList'])->name('cart.list'); 
Route::post('/cart', [CartController::class,'addToCart'])->name('cart.store'); 
Route::post('cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('cart/clear', [CartController::class, 'clearAllCart'])->name('cart.clear');

Route::post('payment', [PaymentController::class, 'payWithpaypal'])->name('payWithpaypal');
Route::get('payment/status', [PaymentController::class, 'getPaymentStatus'])->name('getPaymentStatus');

