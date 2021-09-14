<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\GeneralController;
use App\Http\Controllers\API\V1\ConstantController;
use App\Http\Controllers\API\V1\Auth\AuthController;
use App\Http\Controllers\API\V1\Home\HomeController;
use App\Http\Controllers\API\V1\Users\UserController;
use App\Http\Controllers\API\V1\Order\OrderController;
use App\Http\Controllers\API\V1\Stories\StoryController;
use App\Http\Controllers\API\V1\Packages\FeatureController;
use App\Http\Controllers\API\V1\Packages\PackageController;
use App\Http\Controllers\API\V1\Favorites\FavoriteController;
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
    Route::post('verify-change-password', [AuthController::class, 'verifyChangePassword']);
    Route::post('change-password', [AuthController::class, 'changePassword']);


    Route::get('home', [HomeController::class, 'home']);
    Route::get('orders', [OrderController::class, 'indexGuest']);
    Route::get('orders/{order}', [OrderController::class, 'show']);

    Route::get('real-estates', [RealEstateController::class, 'indexGuest']);
    Route::get('real-estates/{real_estate}', [RealEstateController::class, 'show']);



    // $middleware = ['api'];
    // if (\Request::header('Authorization'))
    //     $middleware = array_merge(['auth:api']);

    // Route::group(['middleware' => $middleware], function () {
    //     Route::get('orders', [OrderController::class, 'index']);
    //     Route::get('orders/{order}', [OrderController::class, 'show']);

    // });
    Route::apiResource('packages', PackageController::class);

    

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout', [AuthController::class, 'logout']);
        Route::get('show-profile', [UserController::class, 'show']);
        Route::post('report', [UserController::class, 'report']);
        Route::post('subscription', [UserController::class, 'subscription']);
        Route::post('update', [UserController::class, 'update']);
        Route::get('my-notifications', [UserController::class, 'myNotification']);


        Route::get('real-estate-types', [ConstantController::class, 'getRealEstateType']);
        Route::get('contract-types', [ConstantController::class, 'getContractType']);
        Route::get('cities', [ConstantController::class, 'getCity']);
        Route::get('counties', [ConstantController::class, 'getCountry']);
        Route::get('views', [ConstantController::class, 'getView']);
        Route::get('creation-constant', [ConstantController::class, 'getCreationConst']);

        Route::post('upload', [GeneralController::class, 'upload']);

        Route::apiResource('stories', StoryController::class);

        Route::apiResource('orders', OrderController::class)->except('index','show');
        Route::get('my-order', [OrderController::class, 'myOrder']);

        Route::get('features', FeatureController::class);

        Route::apiResource('real-estates', RealEstateController::class)->except('index','show');
        Route::get('list-on-map', [RealEstateController::class, 'listOnMap']);
        Route::post('upgrade-real-estate', [RealEstateController::class, 'upgrade']);
        Route::get('my-real-estate', [RealEstateController::class, 'myRealEstate']);
        Route::get('make-my-real-estate-active/{id}', [RealEstateController::class, 'makeActive']);

        Route::get('my-favorite', [FavoriteController::class, 'myFavorite']);
        Route::post('add-favorite', [FavoriteController::class, 'addFavorite']);

        Route::post('un-favorite', [FavoriteController::class, 'unFavorite']);

        // Route::apiResource('case', CaseController::class);

        // Route::Post('send-notification', [NotificationController::class, 'send']);
    });
});
