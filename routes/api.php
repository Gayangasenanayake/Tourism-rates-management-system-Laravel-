<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Live\Http\Controllers\LiveAgentController;
use Modules\Live\Http\Controllers\LiveBoardTypeController;
use Modules\Live\Http\Controllers\LiveHotelController;
use Modules\Rates\Http\Controllers\CurrencyController;
use Modules\Rates\Http\Controllers\HotelRateController;
use Modules\Rates\Http\Controllers\RatesRoomTypeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('agent', LiveAgentController::class);
Route::apiResource('hotel', LiveHotelController::class);
Route::apiResource('room-type', RatesRoomTypeController::class);
Route::apiResource('meal-type', LiveBoardTypeController::class);
Route::apiResource('currency', CurrencyController::class);
Route::apiResource('rate', HotelRateController::class);

