<?php

use App\Http\Controllers\api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('verified.api')->group(function () {
    Route::post('/store',[ApiController::class,'storePurr']);
    Route::get('/banners',[ApiController::class,'banners']);
    Route::get('/featured-users',[ApiController::class,'featuredUser']);
    Route::get('/winner-of-the-month',[ApiController::class,'winnerOfTheMonth']);
    Route::get('/previous-winners',[ApiController::class,'previousWinners']);
    Route::get('/blog-list',[ApiController::class,'blogList']);
    Route::get('/blog-details/{slug}',[ApiController::class,'blogDetails']);
    Route::get('/products',[ApiController::class,'products']);
});


