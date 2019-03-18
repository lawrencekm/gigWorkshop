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
            $table->integer('user_1')->unsigned();
            $table->foreign('user_1')->referencing('id')
                    ->on('users'); 
            $table->integer('user_2')->unsigned();
            $table->foreign('user_2')->referencing('id')
                            ->on('users'); 
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->referencing('id')
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
