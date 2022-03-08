<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Ingredient::factory(100)->create();
    }
}
