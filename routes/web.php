<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\vegetable_function;
use App\Http\Controllers\vegetable_view;
use App\Http\Middleware\adminCheckAuth;
use App\Http\Middleware\CheckProfileComplete;
use App\Models\Products;
use Illuminate\Support\Facades\Route;


Route::controller(vegetable_view::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/Sign_up','register');
    Route::get('/Sign_In', 'login');
    Route::get("/email_verify/{email}",'verify')->name("verify");
    Route::get('/products/{id}', 'details')->name('products.details')->middleware('auth');
    Route::get('/information', 'information')->name('information.create')->middleware('auth');
    Route::get('/cart', 'cart')->name('cart')->middleware("auth");
    Route::get('/orderlist', 'orderlist')->name('orderlist')->middleware("auth");
    Route::get('/profile', 'showProfile')->name('profile')->middleware("auth");
});

Route::controller(vegetable_function::class)->group(function () {
    Route::post('/Sign_up', 'register')->name('register');
    Route::post('/Sign_In', 'login')->name('login');
    Route::post('/email_verify/{email}', 'verify')->name('verify.email');
    Route::post('/logout','logout')->name("logout");
});

Route::controller(ProductsController::class)->group(function () {
    Route::post('/addcart/{id}', 'addcart')->name('addcart')->middleware(CheckProfileComplete::class);
    Route::post('/information', 'information')->name('information')->middleware('auth');;
    Route::delete('/cart/remove/{id}', 'remove')->name('cart.remove')->middleware('auth');
    Route::delete('/orderlist/cancel/{id}', 'cancel')->name('cancel')->middleware('auth');
    Route::post('/checkout', 'checkout')->name('checkout')->middleware('auth');

});

Route::controller(adminController::class)->group(function () {
    Route::get('/admin.login', 'login')->name('admin.loginpage');
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard')->middleware(adminCheckAuth::class);
    Route::post('/admin.login','admin_login')->name('admin.loginfunction');
    Route::put('/admin/adminCheckout/{id}','adminCheckout')->name('admin.checkout');
});