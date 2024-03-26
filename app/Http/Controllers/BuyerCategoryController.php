<?php

namespace App\Http\Controllers;

use App\Http\traits\ApiResponse;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerCategoryController extends ApiController
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Buyer $buyer)
    {
        $categories = $buyer->transactions()->with('product.categories')->get()
        ->pluck('product.categories')
        ->collapse()
        ->unique('id')
        ->values();

        return $this->showAll($categories);
    }

}
