<?php

use App\Models\User;
use App\Mail\AdvertisementEmail;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;

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

Route::post('elm', [App\Http\Controllers\HomeController::class, 'testElm'])->name('elm');

Route::get('/email', function () {
  //  Mail::to('Ezdeal.sa@gmail.com')->send(new AdvertisementEmail());

return 'done';
});
Route::get('/mobile-app-terms-and-conditions', function () {
   
    $terms = App\Models\StaticPage::where('type','terms-and-conditions')->first();
    return view('mobile-web-views.static-page',compact('terms'));
});
Route::get('/give-role', function () {
    //$role = Role::create(['name' => 'Super Admin']);
    $role = Role::where('name' , 'Super Admin')->first();
    $permissions = Permission::get();
    $role->syncPermissions($permissions);
    $user = User::find(1);
    $user->assignRole('Super Admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

require __DIR__ . '/dashboard.php';
