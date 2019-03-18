<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->referencing('id')
                            ->on('orders'); 

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->referencing('id')
                            ->on('users'); 

            $table->integer('transactionmethod_id')->unsigned();
            $table->foreign('transactionmethod_id')->referencing('id')
                      ->on('transactionmethods'); 

            $table->integer('transactionstatus_id')->unsigned();
            $table->foreign('transactionstatus_id')->referencing('id')
                            ->on('transactionstatuses');

            $table->integer('transactiontype_id')->unsigned();
            $table->foreign('transactiontype_id')->referencing('id')
                            ->on('transactiontypes');
                            
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
        Schema::dropIfExists('transactions');
    }
}
