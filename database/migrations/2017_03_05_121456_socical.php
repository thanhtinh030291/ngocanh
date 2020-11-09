<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Socical extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('socicals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');             
            $table->string('icon'); 
            $table->integer('idlang')->unsigned();
            $table->foreign('idlang')->references('id')->on('languages');          
            $table->tinyInteger('hide')->default(1);      
            $table->string('link')->nullable(); 
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
