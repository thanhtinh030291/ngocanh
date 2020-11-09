<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Slides extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idlang')->unsigned();  // hình ảnh
            $table->foreign('idlang')->references('id')->on('languages');
            $table->string('title'); // thứ tự hiện thị
            $table->string('linknew')->nullable(); // thứ tự hiện thị
            $table->string('linkyoutube')->nullable(); // thứ tự hiện thị  
            $table->string('img');  // hình ảnh
            $table->tinyInteger('status'); // tình trạng ẩn hiện
            $table->string('number'); // thứ tự hiện thị          
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
