<?php

namespace App\Http\Controllers;

use App\Http\traits\ApiResponse;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerTransactionController extends ApiController
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index(Buyer $buyer)
    {
        $transactions = $buyer->transactions;

        return $this->showAll($transactions);
    }

}
