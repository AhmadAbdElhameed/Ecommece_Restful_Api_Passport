<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Category;
use App\Models\Transaction;

class CategorySellerController extends ApiController
{
    use ApiResponse;
    public function index(Category $category)
    {
        $sellers = $category->products()->with('seller')->get()
        ->pluck('seller')
        ->unique('id')
        ->values();

        return $this->showAll($sellers);
    }

}
