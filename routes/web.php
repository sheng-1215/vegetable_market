<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\vegetable_function;
use App\Http\Controllers\vegetable_view;
use App\Models\Products;
use Illuminate\Support\Facades\Route;


Route::controller(vegetable_view::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/Sign_up','register');
    Route::get('/Sign_In','login');
    Route::get("/email_verify/{email}",'verify')->name("verify");
});

Route::controller(vegetable_function::class)->group(function () {
    Route::post('/Sign_up', 'register')->name('register');
    Route::post('/Sign_In', 'login')->name('login');
    Route::post('/email_verify/{email}', 'verify')->name('verify.email');
    Route::post('/logout','logout')->name("logout");
});

Route::controller(ProductsController::class)->group(function () {
    Route::get('/products/{id}', 'details')->name('products.details');
    Route::post('/addcart/{id}', 'addcart')->name('addcart');
});