<?php

use App\Http\Controllers\BuyerCategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerProductController;
use App\Http\Controllers\BuyerSellerController;
use App\Http\Controllers\BuyerTransactionController;
use App\Http\Controllers\CategoryBuyerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CategorySellerController;
use App\Http\Controllers\CategoryTransactionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\TransactionCategoryController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\TransactionSellerController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Http\Controllers\AccessTokenController;

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
Route::resource('buyers.transactions', BuyerTransactionController::class)->only('index');
Route::resource('buyers.products', BuyerProductController::class)->only('index');
Route::resource('buyers.sellers', BuyerSellerController::class)->only('index');
Route::resource('buyers.categories', BuyerCategoryController::class)->only('index');
Route::resource('sellers', SellerController::class)->only('index','show');
Route::resource('products', ProductController::class)->only('index','show');
Route::resource('transactions', TransactionController::class)->only('index','show');
Route::resource('transactions.categories', TransactionCategoryController::class)->only('index');
Route::resource('transactions.sellers', TransactionSellerController::class)->only('index');
Route::resource('categories', CategoryController::class)->except('create','edit');
Route::resource('users', UserController::class)->except('create','edit');
Route::resource('category.products', CategoryProductController::class)->only('index');
Route::resource('category.sellers', CategorySellerController::class)->only('index');
Route::resource('category.transactions', CategoryTransactionController::class)->only('index');
Route::resource('category.buyers', CategoryBuyerController::class)->only('index');


Route::post('oauth/token',[AccessTokenController::class,'issueToken']);



