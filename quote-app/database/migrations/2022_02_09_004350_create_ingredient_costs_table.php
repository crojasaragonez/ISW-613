<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_costs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ingredient_id');
            $table->double('cost');
            $table->timestamp('date');
            $table->timestamps();
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_costs');
    }
}
