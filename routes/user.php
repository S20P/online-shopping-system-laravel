<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashBoardController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\PaymentController;


Route::group(['middleware' => 'auth'], function () {
	// Admin Dashboard

	Route::get('/',[DashBoardController::class,'dashboard'])->name('user.dashboard');
	Route::get('dashboard',[DashBoardController::class,'dashboard'])->name('user.dashboard');


   Route::get('checkout',[CheckoutController::class,'getCheckout'])->name('checkout.index');
   Route::post('checkout/order',[CheckoutController::class,'placeOrder'])->name('checkout.place.order');


   Route::get('checkout/payment/complete',[CheckoutController::class,'complete'])->name('checkout.payment.complete');

      Route::get('stripe', [CheckoutController::class, 'stripe'])->name('stripe');
      Route::post('stripe/payment', [PaymentController::class, 'stripePost'])->name('payWithstripe');


 });

