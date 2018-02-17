<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodSelections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_selections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guests_id')->nullable();
            $table->string('food_option', 255)->nullable();
            $table->integer('add_guest_id')->nullable();
            $table->string('add_guest_option', 255)->nullable();
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
        Schema::dropIfExists('food_selections');
    }
}
