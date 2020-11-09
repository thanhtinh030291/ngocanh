<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ListNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('listnews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listname'); 
            $table->string('listimg'); 
            $table->string('listnumber');//vị trí hiện thị
            $table->string('listalt')->nullable();
            $table->integer('listidmod')->unsigned();
            $table->foreign('listidmod')->references('id')->on('modnews');
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
