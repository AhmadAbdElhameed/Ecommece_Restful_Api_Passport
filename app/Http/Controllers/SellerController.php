<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Seller;

class SellerController extends Controller
{
    public function index()
    {
        $sellers = Seller::has('products')->get();
        return response()->json(['data' => $sellers],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        // Check if the buyer has any transactions
        if ($seller->products()->exists()) {
            return response()->json(['data' => $seller], 200);
        }

        // Return a response if the buyer has no transactions
        return response()->json(['error' => 'Seller does not have any products', 'code' => 404], 404);
    }
}
