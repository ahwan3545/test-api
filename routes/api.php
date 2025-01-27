<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Mobile\StoreController;
use App\Http\Controllers\Mobile\AdvertisementController;
use App\Http\Controllers\Mobile\ServiceController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/advertisements', [AdvertisementController::class, 'index']);
Route::get('/services', [ServiceController::class, 'index']);
