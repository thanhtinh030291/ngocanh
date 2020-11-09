<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class News extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('newsname'); 
            $table->string('newalt'); 
            $table->string('newvideo');//vị trí hiện thị
            $table->string('newintro')->nullable();
            $table->string('newcontent');//vị trí hiện thị
            $table->string('newimg');//vị trí hiện thị
            $table->string('newkeywords');//vị trí hiện thị
            $table->string('newtag');//vị trí hiện thị
            $table->string('newuser');//vị trí hiện thị
            $table->tinyInteger('newnumber');//vị trí hiện thị
            $table->integer('idlistnew')->unsigned();
            $table->foreign('idlistnew')->references('id')->on('listnews');
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
