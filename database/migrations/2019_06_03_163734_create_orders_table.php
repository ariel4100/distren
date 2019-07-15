<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_category')->nullable();
            $table->string('name_product')->nullable();

            $table->string('cc')->nullable();
            $table->string('price_cc')->nullable();
            $table->string('price_offer')->nullable();
            $table->string('quantity_cc')->nullable();

            $table->string('name_closure')->nullable();
            $table->string('price_closure')->nullable();
            $table->string('quantity_closure')->nullable();

            $table->string('name_termination')->nullable();
            $table->string('price_termination')->nullable();
            $table->string('quantity_termination')->nullable();

            $table->unsignedBigInteger('transaction_id')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();

            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('capacity_id')->nullable();
            $table->unsignedBigInteger('closure_id')->nullable();
            $table->unsignedBigInteger('termination_id')->nullable();

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
        Schema::dropIfExists('orders');
    }
}
