<?php

use App\Http\Controllers\Client\TourController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\PostController;
use App\Http\Controllers\VNPayController;
use App\Http\Controllers\Client\UserController;

use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function () {
    //route client
    Route::prefix('client')->group(function () {
        //trang chủ người dùng
        Route::get('get-tours-new', [HomeController::class, 'newTours']);
        Route::get('get-tours-feature', [HomeController::class, 'featureTours']);
        Route::get('get-posts-new', [HomeController::class, 'newPosts']);
        //tour
        Route::any('get-tours-list', [TourController::class, 'index']);
        Route::get('get-tour-detail/{id}', [TourController::class, 'show']);
        //post
        Route::any('get-posts-list', [PostController::class, 'index']);
        Route::get('get-post-detail/{id}', [PostController::class, 'show']);

        //user
        Route::group(['prefix' => 'user'], function () {
            Route::post('login', [UserController::class, 'login']);
            Route::post('signup', [UserController::class, 'signup']);
            Route::post('update/{token}', [UserController::class, 'update']);
            Route::get('logout', [UserController::class, 'logout']);
        });

        Route::post('create-payment', [VNPayController::class, 'createPayment']);
    });
        Route::post('create-payment', [VNPayController::class,'createPayment']);
        // Route::get('payment-return', 'VNPayController@paymentReturn');
    });
 
    // Route::get('payment-return', 'VNPayController@paymentReturn');
});

