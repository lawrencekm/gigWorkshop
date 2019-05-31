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
            $table->string('facebook_id')->unique(); //socialite
            $table->string('altemail');
            $table->string('password');
            $table->string('otp');
            $table->string('mobile')->unique();
            $table->date('dob');
            $table->string('referral_code')->unique();
            $table->string('timezone');
            $table->integer('address_id')->unsigned()->nullable();
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->integer('userstatus_id')->unsigned();
            $table->foreign('userstatus_id')->references('id')->on('userstatuses');
            $table->boolean('active')->default(0); //active or inactive
            $table->boolean('promo_email_notifications')->default(true);
            $table->boolean('order_email_notifications')->default(true);
            $table->boolean('available_at_night')->default(true);
            $table->integer('working_status_id')->unsigned(); //working or not working or taking short orders etc...
            $table->foreign('working_status_id')->references('id')->on('workingstatuses'); //working or not working or taking short orders etc...
            $table->integer('organization_id')->unsigned();//parent organization
            $table->foreign('organization_id')->references('id')->on('organizations');//parent organization
            $table->string('National_ID');
            $table->integer('educationlevel_id')->unsigned();
            $table->foreign('educationlevel_id')->references('id')->on('educationlevels');
            $table->text('note');
            $table->string('last_login_ip');
            $table->timestamp('last_login');
            $table->rememberToken();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();

            $table->engine = 'InnoDB';
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
