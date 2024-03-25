<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\Seller;

class SellerController extends ApiController
{
    public function index()
    {
        $sellers = Seller::has('products')->get();
        return $this->showAll($sellers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        // Check if the buyer has any transactions
        if ($seller->products()->exists()) {
            return $this->showOne($seller);
        }

        // Return a response if the buyer has no transactions
        return $this->errorResponse('Seller does not have any products', 404);
    }
}
