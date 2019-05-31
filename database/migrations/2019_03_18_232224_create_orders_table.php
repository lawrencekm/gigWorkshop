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
            $table->integer('discipline_id')->unsigned()->nullable();
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->integer('citation_id')->unsigned()->nullable();
            $table->foreign('citation_id')->references('id')->on('citations');
            $table->integer('sources')->nullable();
            $table->integer('provide_sources');
            $table->string('educationlevel_id');
            $table->string('spacing');
            $table->string('preferred_writer')->nullable(); //or bid
            $table->string('support_note')->nullable(); //by support team
            $table->string('short_description');//by customer
            $table->integer('transactionstatus_id')->unsigned();
            $table->foreign('transactionstatus_id')->references('id')->on('transactionstatuses');
            $table->integer('paymentstatus_id')->unsigned();
            $table->foreign('paymentstatus_id')->references('id')->on('paymentstatuses');
            $table->decimal('price'); //company pay
            $table->integer('pages')->default(0);
            $table->integer('slides')->default(0);
            $table->decimal('cost'); //merchant pay
            $table->datetime('deadline');
            $table->datetime('assigned_at')->nullable();
            $table->datetime('completed_at')->nullable();
            $table->boolean('customer_paid')->default(false); 
            $table->boolean('merchant_paid')->default(false);
            $table->boolean('preview')->default(false); //sample paper
            $table->string('preview_link');
            $table->integer('urgent')->default(false);
            $table->integer('rating_by_customer')->default(0);;
            $table->integer('rating_by_merchant')->default(0);;
            
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
