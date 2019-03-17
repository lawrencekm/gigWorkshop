<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('facebook_id')->unique();
            $table->string('altemail');
            $table->string('password');
            $table->string('otp');
            $table->string('mobile')->unique();
            $table->date('dob');
            $table->string('timezone');
            $table->boolean('active')->default(0); //active or inactive
            $table->boolean('promo_email_notifications')->default(1);
            $table->boolean('order_email_notifications')->default(1);
            $table->boolean('available_at_night')->default(1);
            $table->integer('working_status_id'); //working or not working or taking short orders etc...
            $table->integer('role_id');
            $table->integer('organization_id');//parent organization
            $table->integer('National_ID');
            $table->integer('education_level_id');
            $table->text('note');
            $table->string('last_login_ip');
            $table->timestamp('last_login');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
