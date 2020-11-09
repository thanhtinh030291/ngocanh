<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();            
            $table->integer('view')->default(0);    
            $table->integer('status')->default(1);
            $table->integer('quantity')->default(0); 
            $table->integer('quantity_sale')->default(0);
            $table->integer('idlist')->unsigned(); 
            $table->foreign('idlist')->references('id')->on('listproducts'); 
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
