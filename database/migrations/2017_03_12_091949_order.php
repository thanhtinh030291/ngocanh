<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('idcustomer')->unsigned();
            $table->foreign('idcustomer')->references('id')->on('customers');
            $table->text('name');
            $table->text('address');
            $table->text('telephone');
            $table->text('email');
            $table->text('total_order');
            $table->text('total_pay'); // total_pay = total_order + shipping_fee
            $table->text('comment');
            $table->text('ip');


            // thanh toán
            $table->integer('idpayment')->unsigned();
            $table->foreign('idpayment')->references('id')->on('payments');
            //nếu idpayment có type = cash
            $table->text('payment_name');
            $table->text('payment_telephone');
            $table->text('payment_address');
            //nếu idpayment có type = creditcard
            $table->text('payment_credit_number');
            $table->text('payment_credit_name');
            $table->text('payment_credit_expdate');
            //nếu idpayment có type = atm
            //.....


            // giao hàng
            $table->integer('idshipping')->unsigned();
            $table->foreign('idshipping')->references('id')->on('shippings');
            $table->text('shipping_name');
            $table->text('shipping_telephone');
            $table->text('shipping_address');
            //nếu idshipping có fee = 1, lấy fee từ areashipping của idcity
            $table->text('shipping_fee'); // phí giao hàng, trong bảng areashipping


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
