<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;

class IngredientCostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ingredient_ids = Ingredient::pluck('id');
        return [
            'ingredient_id' => $this->faker->randomElement($ingredient_ids),
            'cost' => $this->faker->numberBetween(100, 10000),
            'date' => $this->faker->dateTime()
        ];
    }
}
