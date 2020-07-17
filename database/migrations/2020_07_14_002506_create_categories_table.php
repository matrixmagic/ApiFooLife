<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parentCategory_id')->nullable();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('displayOrder')->default(0);
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('parentCategory_id')->references('id')->on('categories')->onDelete('cascade');;
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
        Schema::dropIfExists('categories');
    }
}
