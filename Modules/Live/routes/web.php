<?php

use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Support\Facades\Route;
use Modules\Live\Http\Controllers\LiveController;
use Modules\Live\Http\Controllers\LiveHotelController;

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

Route::group([], function () {
    Route::resource('live', LiveController::class)->names('live');
});

Route::apiResource('hotel', LiveHotelController::class);
