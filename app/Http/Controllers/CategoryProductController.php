<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Category;
use App\Models\Transaction;

class CategoryProductController extends ApiController
{
    use ApiResponse;
    public function index(Category $category)
    {
        $products = $category->products;
        return $this->showAll($products);
    }

}
