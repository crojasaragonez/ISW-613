<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class IngredientProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\IngredientProduct::factory(10)->create();
    }
}
