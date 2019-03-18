<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConversationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('topic');
            $table->string('status');
            $table->integer('user_1')->unsigned()->nullable();
            //$table->foreign('user_1')->references('id')->on('users'); 
            $table->integer('user_2')->unsigned()->nullable();
            //$table->foreign('user_2')->references('id') ->on('users'); 
            $table->integer('order_id')->unsigned()->nullable();
            $table->foreign('order_id')->references('id')
                            ->on('orders'); 
            $table->string('ip');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
