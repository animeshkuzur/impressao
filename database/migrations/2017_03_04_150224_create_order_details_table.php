<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_size_id')->unsigned();
            $table->integer('page_type_id')->unsigned();
            $table->integer('print_type_id')->unsigned();
            $table->integer('print_side_id')->unsigned();
            $table->integer('binding_type_id')->unsigned()->nullable();
            $table->integer('document_id')->unsigned();
            $table->integer('pages');
            $table->integer('copies');
            $table->integer('discount_id')->unsigned()->nullable();
            $table->string('comments');
            $table->timestamps();
        });
        Schema::table('order_details',function($table){
            $table->foreign('page_size_id')->references('id')->on('page_sizes');
            $table->foreign('page_type_id')->references('id')->on('page_types');
            $table->foreign('print_type_id')->references('id')->on('print_types');
            $table->foreign('print_side_id')->references('id')->on('print_sides');
            $table->foreign('binding_type_id')->references('id')->on('bindings');
            $table->foreign('document_id')->references('id')->on('documents');
            $table->foreign('discount_id')->references('id')->on('discounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('order_details');
    }
}
