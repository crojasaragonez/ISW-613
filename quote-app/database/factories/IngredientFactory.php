<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'unit' => $this->faker->randomElement(['kg', 'oz', 'hours', 'units']),
            'quantity' => $this->faker->numberBetween(1, 100)
        ];
    }
}
