<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KhoHang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //
         Schema::create('warehouse', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproduct')->unsigned();  // hình ảnh
            $table->foreign('idproduct')->references('id')->on('products');
            $table->tinyInteger('category'); //xuất , nhập, hiệu chỉnh
            $table->string('content'); 
            $table->integer('iduser')->unsigned();
            $table->foreign('iduser')->references('id')->on('users'); 
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
