<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->text('path')->nullable();
            $table->text('url')->nullable();
            $table->integer('isMain')->nullable();
            $table->text('extension')->nullable();
            $table->text('type')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal("height")->nullable();
            $table->decimal("duration_ms")->nullable();
            $table->integer("streams")->nullable();
            $table->decimal("file_size",15)->nullable();
            $table->text('title')->nullable();
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
        Schema::dropIfExists('files');
    }
}
