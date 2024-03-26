<?php

namespace App\Http\Controllers;

use App\Http\traits\ApiResponse;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerProductController extends ApiController
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Buyer $buyer)
    {
        $products = $buyer->transactions()->with('product')->get()
            ->pluck('product');

        return $this->showAll($products);
    }

}
