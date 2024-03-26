<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\traits\ApiResponse;
use App\Models\Product;

class ProductController extends ApiController
{
    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return $this->showAll($products);
    }


    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $this->showOne($product);
    }

}
