<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\CallController;
use App\Http\Controllers\API\V1\CaseController;
use App\Http\Controllers\API\V1\TaskController;
use App\Http\Controllers\API\V1\ReportController;
use App\Http\Controllers\API\V1\ConstantController;
use App\Http\Controllers\API\V1\AttendanceController;
use App\Http\Controllers\API\V1\CallMangerController;
use App\Http\Controllers\API\V1\MeasurementController;
use App\Http\Controllers\API\V1\NotificationController;
use App\Http\Controllers\API\V1\MedicalRecordController;

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

    Route::group(['middleware' => 'auth:api'], function () {
       // Route::post('show-profile', [AuthController::class, 'show']);
       // Route::apiResource('case', CaseController::class);
       
       // Route::Post('send-notification', [NotificationController::class, 'send']);
    });
});
