<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('customerId')->unsigned();
            $table->foreign('customerId')->references('id')->on('customer');
            $table->integer('roomId')->unsigned();
            $table->foreign('roomId')->references('id')->on('roomlist');
            $table->date('checkIn');
            $table->date('checkOut');
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction');
    }
}
