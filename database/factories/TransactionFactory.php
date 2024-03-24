<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product = Product::inRandomOrder()->first();
        $seller_id = $product->seller_id;

        // Get a random user (buyer) who is not the seller of the product.
        $buyer_id = User::where('id', '!=', $seller_id)->inRandomOrder()->first()->id;

        return [
            'quantity' => $this->faker->numberBetween(1, 10), // Example quantity
            'buyer_id' => $buyer_id, // Ensure the buyer is not the seller
            'product_id' => $product->id, // Product from the random seller
        ];
    }
}
