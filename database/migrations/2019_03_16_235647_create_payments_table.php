<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
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
            $table->timestamps();

            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->referencing('id')
                            ->on('orders'); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->referencing('id')
                            ->on('users'); 

            $table->integer('paymentmethod_id')->unsigned();
            $table->foreign('paymentmethod_id')->referencing('id')
                            ->on('paymentmethods'); 

            $table->integer('paymentstatuses_id')->unsigned();
            $table->foreign('paymentstatuses_id')->referencing('id')
                            ->on('paymentstatuses');

                            
            $table->float('amount');
            $table->string('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
