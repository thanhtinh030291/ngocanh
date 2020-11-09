<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GroupCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('groupcustomer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('listname'); 
            $table->string('listimg'); 
            $table->string('listnumber');//vị trí hiện thị
            $table->string('listalt')->nullable();
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
