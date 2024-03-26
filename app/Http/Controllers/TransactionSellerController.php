<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Transaction;

class TransactionSellerController extends ApiController
{
    use ApiResponse;
    public function index(Transaction $transaction)
    {
        $seller = $transaction->product->seller;
        return $this->showOne($seller);
    }

}
