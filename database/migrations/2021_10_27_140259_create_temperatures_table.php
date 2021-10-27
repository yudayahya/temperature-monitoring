<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperaturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temperatures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fish_pool_id');
            $table->integer('temperature')->comment('celcius');
            $table->integer('ph');
            $table->dateTime('time');
            $table->timestamps();
        });

        Schema::table('temperatures', function (Blueprint $table) {
            $table->foreign('fish_pool_id')->references('id')->on('fish_pools');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temperatures');
    }
}
