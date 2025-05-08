<?php

use App\Auth;
use App\Http\Controllers\ProductController;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('products', [ProductController::class, 'index']);
Route::get('products/get', [ProductController::class, 'get']);
Route::get('products/{product}', [ProductController::class, 'show']);
Route::middleware("api_auth")->group(function() {
    //
});
