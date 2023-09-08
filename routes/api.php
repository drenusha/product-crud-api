<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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



Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);

Route::group(['middleware'=>'api'],function(){
    Route::post('logout', [AuthController::class,'logout']);
    Route::post('refresh', [AuthController::class,'refresh']);
    Route::post('me', [AuthController::class,'me']);
    
// List all products
Route::get('products', [ProductController::class, 'index']);

// Show a single product
Route::get('products/{id}', [ProductController::class, 'show']);

// Create a new product
Route::post('products', [ProductController::class, 'store']);

// Update a product
Route::put('products/{id}', [ProductController::class, 'update']);

// Delete a product
Route::delete('products/{id}', [ProductController::class, 'destroy']);
});
