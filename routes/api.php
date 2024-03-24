<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SellerController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('buyers', BuyerController::class)->only('index','show');
Route::resource('sellers', SellerController::class)->only('index','show');
Route::resource('products', BuyerController::class)->only('index','show');
Route::resource('transactions', BuyerController::class)->only('index','show');
Route::resource('categories', CategoryController::class)->except('create','edit');
Route::resource('users', CategoryController::class)->except('create','edit');
