<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id');

            $table->foreignId('product_id');
            $table->string('product_name');

            $table->bigInteger('price');
            $table->bigInteger('total');
            $table->bigInteger('kg');
            $table->bigInteger('size');
            $table->bigInteger('out');
            $table->timestamps();


            $table->foreign('sale_id')
            ->references('id')
            ->on('sales');

            $table->foreign('product_id')
                ->references('id')
                ->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sales');
    }
}
