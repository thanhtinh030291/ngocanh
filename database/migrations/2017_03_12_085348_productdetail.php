<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productdetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {     
        Schema::create('productdetail', function (Blueprint $table) {       
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('description');
            $table->text('content');
            $table->integer('price')->default(0);
            $table->integer('price_to_sale')->default(0);
            $table->integer('price_compare')->default(0);
            $table->string('unit');
            $table->string('currency');
            $table->integer('idproduct')->unsigned();  
            $table->foreign('idproduct')->references('id')->on('products');
            $table->integer('idlang')->unsigned(); 
            $table->foreign('idlang')->references('id')->on('languages');  
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
