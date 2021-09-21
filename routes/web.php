<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

Route::get('elm', [App\Http\Controllers\HomeController::class, 'testElm'])->name('elm');

Route::get('/test', function () {
    Mail::send('social@ezdeal.net', function($message) {
        $message->subject("A new Member has been Registered" );
        $message->from('noreply@mydomain.net', 'Your application title');
        $message->to('fadel.labanie@gmail.com');
    });

});
Route::get('/mobile-app-terms-and-conditions', function () {
   
    $terms = App\Models\StaticPage::where('type','terms-and-conditions')->first();
    return view('mobile-web-views.static-page',compact('terms'));
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/dashboard.php';
