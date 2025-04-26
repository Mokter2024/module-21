<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/products', [ProductController::class, 'index']);
Route::post('/add-products', [ProductController::class, 'store']);
//Route::patch('/products-show/{id}', [ProductController::class, 'show']);
//Route::post('/products', [ProductController::class, 'store']);

Route::put('/product-update/{id}', [ProductController::class, 'update']);
Route::delete('/products-delete/{id}', [ProductController::class, 'destroy']);
