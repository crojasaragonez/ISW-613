<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Client;
use App\Models\User;

class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client_ids = Client::pluck('id');
        $user_ids = User::pluck('id');
        return [
            'client_id' => $this->faker->randomElement($client_ids),
            'date' => $this->faker->dateTime(),
            'state' => $this->faker->randomElement(['New', 'Sent', 'Seen', 'Approved']),
            'created_by_user_id' => $this->faker->randomElement($user_ids),
            'updated_by_user_id' => $this->faker->randomElement($user_ids),
        ];
    }
}
