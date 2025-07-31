<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EcommerceController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [EcommerceController::class, 'addProduct']);
    Route::post('/orders', [EcommerceController::class, 'placeOrder']);
    Route::get('/orders', [EcommerceController::class, 'listOrders']);
});
