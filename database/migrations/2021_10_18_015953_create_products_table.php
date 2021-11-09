<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
 /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',45);
            $table->string('description',90);
            $table->foreignId('small_id')->nullable();
            $table->foreignId('medium_id')->nullable();
            $table->foreignId('big_id')->nullable();

            $table->string('img',100);
            $table->timestamps();

            $table->foreign('small_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('Cascade');
            $table->foreign('medium_id')
            ->references('id')
            ->on('sizes')
            ->onDelete('Cascade');
            $table->foreign('big_id')
            ->references('id')
            ->on('sizes')
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
        Schema::dropIfExists('products');
    }
}
