<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('discipline_order', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('discipline_id')->unsigned();
            $table->foreign('discipline_id')->referencing('id')->on('disciplines');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->referencing('id')->on('orders');
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
        Schema::dropIfExists('discipline_order');

    }
}
