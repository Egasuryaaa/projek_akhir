<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CartController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    // Produk
    Route::get('/products', [ProductController::class, 'index']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/products/{product}', [ProductController::class, 'show']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);

    // Cart
    
    Route::get('/cart/{cartId}', [CartController::class, 'apiShow']);
    Route::post('/carts', [CartController::class, 'store']);

    // Cart Items
    Route::post('/cart-items', [CartItemController::class, 'store']);
    Route::get('/cart-items', [CartItemController::class, 'index']);
    Route::put('/cart-items/{cartItem}', [CartItemController::class, 'update']);
    Route::delete('/cart-items/{cartItem}', [CartItemController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->prefix('admin')->group(function () {
    // ...produk...
    Route::post('/cart-items', [CartItemController::class, 'store']);
    Route::get('/cart-items', [CartItemController::class, 'index']); // <--- tambahkan ini jika perlu GET
    Route::put('/cart-items/{cartItem}', [CartItemController::class, 'update']); // <--- jika perlu update
    Route::delete('/cart-items/{cartItem}', [CartItemController::class, 'destroy']);
});