<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id')->nullable();
            $table->unsignedBigInteger('file_id')->nullable();
            $table->string('name')->nullable();
            $table->integer('sunday')->default(0);
            $table->integer('monday')->default(0);
            $table->integer('tuesday')->default(0);
            $table->integer('wednesday')->default(0);
            $table->integer('thursday')->default(0);
            $table->integer('friday')->default(0);
            $table->integer('saturday')->default(0);
            $table->time('from', 0)->nullable();
            $table->time('to', 0)->nullable();
            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
