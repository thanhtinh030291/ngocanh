<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Payments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name')->nullable();
            $table->text('type')->nullable(); // cash-tiền mặt, atm-ngân hàng, creditcart-ghi nợ (xác định để ẩn hiện các form ngoài giao diện)
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
