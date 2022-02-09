<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Ingredient;

class IngredientProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_ids = Product::pluck('id');
        $ingredient_ids = Ingredient::pluck('id');
        return [
            'product_id' => $this->faker->randomElement($product_ids),
            'ingredient_id' => $this->faker->randomElement($ingredient_ids),
            'quantity' => $this->faker->numberBetween(1, 10),
        ];
    }
}
