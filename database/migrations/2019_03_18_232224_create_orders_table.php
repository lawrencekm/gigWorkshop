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
            $table->integer('orderstatus_id')->unsigned();
            $table->foreign('orderstatus_id')->references('id')->on('orderstatuses');
            $table->integer('typeofwork_id')->unsigned();
            $table->foreign('typeofwork_id')->references('id')->on('typeofworks');
            $table->integer('citation_id')->unsigned()->nullable();
            $table->foreign('citation_id')->references('id')->on('citations');
            $table->integer('sources');
            $table->integer('provide_sources');
            $table->string('educationlevel_id');
            $table->string('spacing');
            $table->string('preferred_writer'); //or bid
            $table->string('support_note'); //by support team
            $table->string('short_description');//by customer
            $table->integer('transactionstatus_id')->unsigned();
            $table->foreign('transactionstatus_id')->references('id')->on('transactionstatuses');
            $table->float('price'); //company pay
            $table->integer('pages');
            $table->integer('slides');
            $table->float('cost'); //merchant pay
            $table->datetime('deadline');
            $table->datetime('assigned_at');
            $table->datetime('completed_at');
            $table->boolean('customer_paid')->default(false); 
            $table->boolean('merchant_paid')->default(false);
            $table->boolean('preview')->default(false); //sample paper
            $table->string('preview_link');
            $table->boolean('urgent')->default(false);
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
