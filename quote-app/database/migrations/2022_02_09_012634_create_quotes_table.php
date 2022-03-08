<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->unsignedBigInteger('client_id');
            $table->enum('state', ['New', 'Sent', 'Seen', 'Approved']);
            $table->timestamps();
            $table->unsignedBigInteger('created_by_user_id');
            $table->unsignedBigInteger('updated_by_user_id');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
