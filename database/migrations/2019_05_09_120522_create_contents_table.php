<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->text('text')->nullable();
            $table->string('ficha')->nullable();
            $table->text('icon')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('link')->nullable();
            $table->text('ruta')->nullable();
            $table->string('section')->nullable();
            $table->string('type')->nullable();
            $table->boolean('destacado')->default(false);
            $table->string('order')->nullable();

            $table->boolean('eliminable')->default(true);
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
        Schema::dropIfExists('contents');
    }
}
