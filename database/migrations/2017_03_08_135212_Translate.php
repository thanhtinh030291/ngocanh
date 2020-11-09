<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Translate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('translates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('trname'); 
            $table->integer('trcate'); //1 tin tuc - 2 san pham
            $table->integer('trmod');//1 the loai - 2 loai tin
            $table->integer('trid');//id thay the           
            $table->integer('tridlang')->unsigned();
            $table->foreign('tridlang')->references('id')->on('languages');
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
