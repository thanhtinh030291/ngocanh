<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Advert extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img'); 
            $table->integer('idlang')->unsigned();
            $table->foreign('idlang')->references('id')->on('languages');          
            $table->tinyInteger('hide')->default(1);         
            $table->tinyInteger('area')->default(1);   //khu vuc hien thi      
            $table->string('link')->nullable(); 
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
