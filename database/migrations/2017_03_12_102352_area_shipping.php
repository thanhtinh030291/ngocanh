<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AreaShipping extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('areashipping', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('fee')->nullable();
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
