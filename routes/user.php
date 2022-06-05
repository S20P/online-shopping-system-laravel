<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashBoardController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\PaymentController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ProfileController;


Route::group(['middleware' => 'auth'], function () {
	// Admin Dashboard

	Route::get('/',[DashBoardController::class,'dashboard'])->name('user.dashboard');
	Route::get('dashboard',[DashBoardController::class,'dashboard'])->name('user.dashboard');

   Route::get('profile',[ProfileController::class,'getProfile'])->name('user.profile');
   Route::post('profile/update',[ProfileController::class,'updateProfile'])->name('user.profile.save');

   Route::get('checkout',[CheckoutController::class,'getCheckout'])->name('checkout.index');
   Route::post('checkout/order',[CheckoutController::class,'placeOrder'])->name('checkout.place.order');


   Route::get('checkout/payment/complete',[CheckoutController::class,'complete'])->name('checkout.payment.complete');

      Route::get('stripe', [CheckoutController::class, 'stripe'])->name('stripe');
      Route::post('stripe/payment', [PaymentController::class, 'stripePost'])->name('payWithstripe');

    
     Route::group(['prefix' => 'orders'], function () {
           Route::get('/', [OrderController::class,'index'])->name('user.orders.index');		 
		   Route::get('/{order}/show',[OrderController::class,'show'])->name('user.orders.show');
       });


  
 });

