<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('address_id')->unsigned();
            $table->integer('order_detail_id')->unsigned();
            $table->integer('payment_mode_id')->unsigned();
            $table->dateTime('date_time');
            $table->decimal('amount', 5, 2);
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
        Schema::table('orders',function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('address_id')->references('id')->on('user_addresses');
            $table->foreign('order_detail_id')->references('id')->on('order_details');
            $table->foreign('payment_mode_id')->references('id')->on('payment_modes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
