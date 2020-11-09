<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Orderproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderproduct', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->integer('quantity');
            $table->text('price');
            $table->text('total');
            $table->integer('idproduct')->unsigned();
            $table->foreign('idproduct')->references('id')->on('products');
            $table->integer('idorder')->unsigned();
            $table->foreign('idorder')->references('id')->on('order');
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
        //
    }
}
