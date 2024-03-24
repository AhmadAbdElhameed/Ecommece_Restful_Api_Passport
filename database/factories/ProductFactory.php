<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'description' => fake()->paragraph(2),
            'quantity' => fake()->numberBetween(1,20),
            'status' => fake()->randomElement([Product::AVAILABLE_PRODUCT,Product::UNAVAILABLE_PRODUCT]),
            'image' => fake()->randomElement(['1.png','2.png','3.png','4.jpg','5.jpg',
                                    '6.jpg','7.jpg','8.jpg','9.jpg','10.jpg']),
            'seller_id' => User::all()->random()->id,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            // Attach 1 to 5 random categories to the product
            $categories = Category::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $product->categories()->attach($categories);
        });
    }
}
