<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuyerRequest;
use App\Http\Requests\UpdateBuyerRequest;
use App\Models\Buyer;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buyers = Buyer::has('transactions')->get();
        return response()->json(['data' => $buyers],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        // Check if the buyer has any transactions
        if ($buyer->transactions()->exists()) {
            return response()->json(['data' => $buyer], 200);
        }

        // Return a response if the buyer has no transactions
        return response()->json(['error' => 'Buyer does not have any transactions', 'code' => 404], 404);
    }
}
