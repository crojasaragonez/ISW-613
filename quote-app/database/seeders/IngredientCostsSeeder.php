<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IngredientCostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\IngredientCosts::factory(20)->create();
    }
}
