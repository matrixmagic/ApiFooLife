<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->integer('accessible')->default(false)->nullable();
            $table->integer('childfriendly')->default(false)->nullable();
            $table->integer('gamepad')->default(false)->nullable();
            $table->integer('wifi')->default(false)->nullable();
            $table->integer('power')->default(false)->nullable();
            $table->integer('pets')->default(false)->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
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
        Schema::dropIfExists('restaurant_services');
    }
}
