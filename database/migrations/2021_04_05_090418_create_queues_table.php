<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('output_id')->nullable();
            $table->string('title')->nullable();
            $table->json('options')->nullable();
            
            $table->unsignedBigInteger('pid')->nullable();
            $table->string('fileName')->nullable();
            $table->string('output_path')->nullable();
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            
            
            $table->decimal('duration',20,7)->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('queues');
    }
}
