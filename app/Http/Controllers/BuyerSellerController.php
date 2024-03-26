<?php

namespace App\Http\Controllers;

use App\Http\traits\ApiResponse;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerSellerController extends ApiController
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Buyer $buyer)
    {
        $sellers = $buyer->transactions()->with('product.seller')->get()
        ->pluck('product.seller')
        ->unique('id')
        ->values();

        return $this->showAll($sellers);
    }

}
