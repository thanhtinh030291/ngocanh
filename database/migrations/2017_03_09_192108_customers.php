<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idgroup')->unsigned();  // hình ảnh
            $table->foreign('idgroup')->references('id')->on('groupcustomer');
            $table->string('cusfullname'); 
            $table->string('cusemail'); 
            $table->integer('cusphone')->nullable(); 
            $table->string('cusimg');  // hình ảnh
            $table->tinyInteger('status'); // tình trạng ẩn hiện
            $table->string('cusaddress');           
            $table->string('cusface')->nullable();         
            $table->string('cuspass')->nullable(); 
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
