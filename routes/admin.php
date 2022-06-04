<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/login', [AdminAuthController::class, 'getLogin'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => 'adminauth'], function () {
	// Admin Dashboard
	Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');

   //Products 
   Route::group(['prefix' => 'products'], function () {
  
	   Route::get('/', [ProductController::class,'index'])->name('admin.products.index');
	   Route::get('/create', [ProductController::class,'create'])->name('admin.products.create');
	   Route::post('/store', [ProductController::class,'store'])->name('admin.products.store');
	   Route::get('/edit/{id}', [ProductController::class,'edit'])->name('admin.products.edit');
	   Route::post('/update', [ProductController::class,'update'])->name('admin.products.update');
	   Route::get('/delete/{id}', [ProductController::class,'destroy'])->name('admin.products.delete');
	  
   });
   //@end :: Products 


   //Categories   
	 Route::group(['prefix' => 'categories'], function () {
	  
		   Route::get('/', [CategoryController::class,'index'])->name('admin.categories.index');
		   Route::get('/create', [CategoryController::class,'create'])->name('admin.categories.create');
		   Route::post('/store', [CategoryController::class,'store'])->name('admin.categories.store');
		   Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('admin.categories.edit');
		   Route::post('/update', [CategoryController::class,'update'])->name('admin.categories.update');
		   Route::get('/delete/{id}', [CategoryController::class,'destroy'])->name('admin.categories.delete');
		  
	   });
   //@end::Categories


   //Brands
	 Route::group(['prefix' => 'brands'], function () {
		  
			   Route::get('/', [BrandController::class,'index'])->name('admin.brands.index');
			   Route::get('/create', [BrandController::class,'create'])->name('admin.brands.create');
			   Route::post('/store', [BrandController::class,'store'])->name('admin.brands.store');
			   Route::get('/edit/{id}', [BrandController::class,'edit'])->name('admin.brands.edit');
			   Route::post('/update', [BrandController::class,'update'])->name('admin.brands.update');
			   Route::get('/delete/{id}', [BrandController::class,'destroy'])->name('admin.brands.delete');
			  
	   });
   //@end::Brands


     //Settings
	 Route::group(['prefix' => 'settings'], function () {		    
		       Route::get('/edit', [SettingController::class,'edit'])->name('admin.settings.edit');	
			   Route::post('/update', [SettingController::class,'update'])->name('admin.settings.update');		  
		  });
   //@end::Settings
      
      

  //orders
      Route::group(['prefix' => 'orders'], function () {
           Route::get('/', [OrderController::class,'index'])->name('admin.orders.index');		 
		   Route::get('/{order}/show',[OrderController::class,'show'])->name('admin.orders.show');
       });

  // @end:://orders


});