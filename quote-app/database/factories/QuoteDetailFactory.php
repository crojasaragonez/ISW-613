<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Quote;
use App\Models\Product;

class QuoteDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $quote_ids = Quote::pluck('id');
        $product_ids = Product::pluck('id');
        return [
            'quote_id' => $this->faker->randomElement($quote_ids),
            'product_id' => $this->faker->randomElement($product_ids),
            'quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->numberBetween(100, 100000),
        ];
    }
}
