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
            $table->boolean('accessible')->default(false)->nullable();
            $table->boolean('childfriendly')->default(false)->nullable();
            $table->boolean('gamepad')->default(false)->nullable();
            $table->boolean('wifi')->default(false)->nullable();
            $table->boolean('power')->default(false)->nullable();
            $table->boolean('pets')->default(false)->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
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
