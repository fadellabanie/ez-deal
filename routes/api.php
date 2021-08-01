<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\GeneralController;
use App\Http\Controllers\API\V1\ConstantController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\RealEstate\OrderController;
use App\Http\Controllers\API\V1\RealEstate\RealEstateController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix' => 'v1'], function () {
  
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('verify', [AuthController::class, 'check']);

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('show-profile', [AuthController::class, 'show']);
        Route::post('verify-change-password', [AuthController::class, 'verifyChangePassword']);
        Route::post('change-password', [AuthController::class, 'changePassword']);

        Route::get('real-estate-types', [ConstantController::class, 'getRealEstateType']);
        Route::get('contract-types', [ConstantController::class, 'getContractType']);
        
        Route::get('cities', [ConstantController::class, 'getCity']);
        Route::get('counties', [ConstantController::class, 'getCountry']);
        Route::post('upload', [GeneralController::class, 'upload']);

        Route::apiResource('orders',OrderController::class);
        Route::apiResource('real-estates',RealEstateController::class);
       // Route::apiResource('case', CaseController::class);
       
       // Route::Post('send-notification', [NotificationController::class, 'send']);
    });
});
