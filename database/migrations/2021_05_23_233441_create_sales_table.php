<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('client_name');


            $table->foreignId('product_id');
            $table->string('product_name');

            $table->bigInteger('balance');
            $table->bigInteger('inv_house');
            $table->bigInteger('inv_store');
            $table->bigInteger('price');
            $table->bigInteger('transaction');
            $table->timestamps();


            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
            ->onDelete('Cascade');



            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('Cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
