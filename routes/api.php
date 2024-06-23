<?php

use App\Http\Controllers\API\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WEB\OfficeController;
use App\Http\Controllers\API\Client\OrderController;
use App\Http\Controllers\WEB\FavouriteController;

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

Route::middleware('auth:sanctum')->group(function () {



    Route::post('/favourite/{office}', [FavouriteController::class, 'add']);
    Route::delete('/favourite/{office}', [FavouriteController::class, 'remove']);
    Route::get('/favourites', [FavouriteController::class, 'index']);
    Route::prefix('orders')->controller(OrderController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/', 'store');
        Route::get('/{id}', 'show');
        Route::get('Show_UserOrder/{id}', 'ShowUserOrder');
        Route::post('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
});

Route::post('ForgetPassword',[AuthController::class,'ForgetPassword']);

Route::post('ResetPassword',[AuthController::class,'ResetPassword']);



Route::get('offices/{city?}/{governorate?}', [OfficeController::class,'index']);


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);
Route::post('logout',[AuthController::class,'logout']);


