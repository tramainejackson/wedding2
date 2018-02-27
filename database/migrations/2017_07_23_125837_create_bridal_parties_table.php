<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBridalPartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bridal_parties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order');
            $table->string('title', 50);
            $table->string('name', 30);
            $table->string('image', 30);
            $table->text('blurb');
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
        Schema::dropIfExists('bridal_parties');
    }
}
