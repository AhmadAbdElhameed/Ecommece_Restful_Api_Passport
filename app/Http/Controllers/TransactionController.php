<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Http\traits\ApiResponse;
use App\Models\Transaction;

class TransactionController extends ApiController
{
    use ApiResponse;
    public function index()
    {
        $transactions = Transaction::all();

        return $this->showAll($transactions);
    }


    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        return $this->showOne($transaction);
    }
}
