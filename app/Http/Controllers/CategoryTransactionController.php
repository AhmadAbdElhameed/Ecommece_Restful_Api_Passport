<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Category;
use App\Models\Transaction;

class CategoryTransactionController extends ApiController
{
    use ApiResponse;
    public function index(Category $category)
    {
        $transactions = $category->products()
            ->whereHas('transactions')
            ->with('transactions')
            ->get()
            ->pluck('transactions')
            ->collapse();
        return $this->showAll($transactions);
    }

}
