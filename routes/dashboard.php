<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {
    Route::get('/',[App\Http\Controllers\Dashboard\HomeController::class,'index'])->name('admin');

    Route::resource('users', App\Http\Controllers\Dashboard\UserController::class);
    Route::resource('orders', App\Http\Controllers\Dashboard\OrderController::class);
    Route::resource('packages', App\Http\Controllers\Dashboard\PackageController::class);
  
    Route::get('admin',function(){
        return 'admin';
    });

});
