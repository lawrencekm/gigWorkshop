<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubjectUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('discipline_user', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('discipline_id')->unsigned();
            $table->foreign('discipline_id')->referencing('id')->on('disciplines');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->referencing('id')->on('users');
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
        Schema::dropIfExists('discipline_user');

    }
}
