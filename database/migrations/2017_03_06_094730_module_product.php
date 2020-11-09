<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModuleProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('modproducts', function (Blueprint $table) {
            $table->increments('id');             
            $table->integer('idlang')->unsigned();
            $table->foreign('idlang')->references('id')->on('languages');
            $table->string('modname');             
            $table->string('modnumber'); //vị trí hiện thị 
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
