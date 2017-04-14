<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_size_id')->unsigned();
            $table->integer('page_type_id')->unsigned();
            $table->integer('print_type_id')->unsigned();
            $table->integer('print_side_id')->unsigned();
            $table->decimal('price', 5, 2);
            $table->timestamps();
        });
        Schema::table('prices',function($table){
            $table->foreign('page_size_id')->references('id')->on('page_sizes');
            $table->foreign('page_type_id')->references('id')->on('page_types');
            $table->foreign('print_type_id')->references('id')->on('print_types');
            $table->foreign('print_side_id')->references('id')->on('print_sides');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('prices');
    }
}