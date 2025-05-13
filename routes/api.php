<?php

use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\CheckoutController;
use App\Http\Controllers\API\TransactionController;
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

// Public API routes
Route::get('/menus', [MenuController::class, 'index']);
Route::get('/menus/{product}', [MenuController::class, 'show']);
Route::get('/categories', [MenuController::class, 'categories']);

// Protected API routes
Route::middleware('auth:sanctum')->group(function () {
    // User info
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    // Cart endpoints
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::put('/cart/update', [CartController::class, 'update']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove']);
    Route::get('/cart/count', [CartController::class, 'getCartItemCount']);
    
    // Checkout endpoints
    Route::post('/checkout', [CheckoutController::class, 'process']);
    Route::get('/checkout/status/{id}', [CheckoutController::class, 'status']);
    
    // Transaction endpoints
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
});