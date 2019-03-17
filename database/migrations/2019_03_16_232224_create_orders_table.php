<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('topic');
            $table->string('customer_id');
            $table->string('merchant_id');
            $table->string('status_id');
            $table->string('citation_id');
            $table->integer('sources');
            $table->integer('provide_sources');
            $table->string('educationlevel_id');
            $table->string('spacing');
            $table->string('preferred_writer'); //or bid
            $table->string('support_note'); //by support team
            $table->string('short_description');//by customer
            $table->string('payment_status');
            $table->float('price'); //company pay
            $table->integer('pages');
            $table->integer('slides');
            $table->float('cost'); //merchant pay
            $table->datetime('deadline');
            $table->timestamp('assigned_at');
            $table->timestamp('completed_at');
            $table->boolean('customer_paid')->default(0); 
            $table->boolean('merchant_paid')->default(0);
            $table->boolean('preview')->default(0); //sample paper
            $table->string('preview_link');
            $table->boolean('urgent')->default(0);
            $table->integer('rating_by_customer');
            $table->integer('rating_by_merchant'); 
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
