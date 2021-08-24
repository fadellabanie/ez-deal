<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','as' => 'admin.','middleware'=>'auth'], function () {
    Route::get('/',[App\Http\Controllers\Dashboard\HomeController::class,'index'])->name('admin');

    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);
    Route::resource('orders', App\Http\Controllers\Dashboard\OrderController::class);
    Route::resource('real-estates', App\Http\Controllers\Dashboard\RealEstateController::class);
    Route::resource('packages', App\Http\Controllers\Dashboard\PackageController::class);
    Route::resource('attributes', App\Http\Controllers\Dashboard\AttributeController::class);

    Route::resource('cities', App\Http\Controllers\Dashboard\CityController::class);
    Route::resource('countries', App\Http\Controllers\Dashboard\CountryController::class);

  
    Route::get('admin',function(){
        return 'admin';
    });



});
