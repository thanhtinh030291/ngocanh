<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('listproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listname'); 
            $table->string('listimg'); 
            $table->string('listnumber');//vị trí hiện thị
            $table->integer('listidmod')->unsigned();
            $table->foreign('listidmod')->references('id')->on('modproducts');
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
