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


            $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('capacity_id')->references('id')->on('capacities')->onDelete('cascade');
            $table->foreign('closure_id')->references('id')->on('closures')->onDelete('cascade');
            $table->foreign('termination_id')->references('id')->on('terminations')->onDelete('cascade');
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
