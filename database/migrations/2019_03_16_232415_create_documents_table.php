<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->referencing('id')
                    ->on('orders')->onDelete('cascade');

            $table->integer('owner_id')->unsigned();
            $table->foreign('owner_id')->referencing('id')
                    ->on('users');  //deletion unexpected
            $table->integer('documenttype_id')->unsigned();
            $table->foreign('documenttype_id')->referencing('id')
                            ->on('documenttypes');  //deletion unexpected
        
            $table->string('description');
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
        Schema::dropIfExists('documents');
    }
}
