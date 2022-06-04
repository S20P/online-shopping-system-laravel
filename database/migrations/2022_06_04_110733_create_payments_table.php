<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
             $table->unsignedBigInteger('order_id')->index();
             $table->unsignedBigInteger('customer_id')->index();
             $table->string('customer_name')->nullable();
             $table->string('payment_id')->nullable();
             $table->string('payment_name')->nullable();
             $table->string('payment_method')->nullable();
             $table->string('payment_status')->nullable();
             $table->string('payment_date')->nullable();            

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('payments');
    }
}
