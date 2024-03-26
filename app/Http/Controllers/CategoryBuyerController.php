<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Category;
use App\Models\Transaction;

class CategoryBuyerController extends ApiController
{
    use ApiResponse;
    public function index(Category $category)
    {
        $transactions = $category->products()
            ->whereHas('transactions')
            ->with('transactions.buyer')
            ->get()
            ->pluck('transactions')
            ->collapse()
            ->pluck('buyer')
            ->unique('id')
            ->values();
        return $this->showAll($transactions);
    }


//    public function index(Category $category)
//    {
//        // Eager load products, transactions, and buyers for the given category
//        $category->load('products.transactions.buyer');
//
//        // Collect all buyers from the category's products' transactions
//        $buyers = $category->products->flatMap(function ($product) {
//            return $product->transactions->pluck('buyer');
//        })->unique('id')->filter();
//
//        // Return the buyers as a JSON response
//        return response()->json(['data' => $buyers], 200);
//    }
}
