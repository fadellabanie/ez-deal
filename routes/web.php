<?php

use Illuminate\Support\Facades\Hash;
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
    return view('welcome');
});

Route::get('/test', function () {
    $test =  Hash::make('12345678');
    return $test;
});
Route::get('/mobile-app-terms-and-conditions', function () {
   
    $terms = App\Models\StaticPage::where('type','terms-and-conditions')->first();
    return view('mobile-web-views.static-page',compact('terms'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/dashboard.php';
