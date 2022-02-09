<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredient_products', function (Blueprint $table) {
            $table->id();
            $table->double('quantity');
            $table->unsignedBigInteger('ingredient_id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_products');
    }
}
