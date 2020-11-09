<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Shippings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->integer('fee')->default(0); // hình thức giao hàng có tính phí hay không
            $table->integer('status');
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
