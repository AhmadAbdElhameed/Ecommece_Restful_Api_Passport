<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Models\Buyer;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')->get();
        return $this->showAll($buyers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        // Check if the buyer has any transactions
        if ($buyer->transactions()->exists()) {
            return $this->showOne($buyer);
        }

        // Return a response if the buyer has no transactions
        return $this->errorResponse('Buyer does not have any transactions', 404);
    }
}
