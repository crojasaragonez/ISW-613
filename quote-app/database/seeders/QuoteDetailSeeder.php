<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuoteDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\QuoteDetail::factory(100)->create();
    }
}
