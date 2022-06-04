<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();            
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable(); 
            $table->text('about')->nullable();        
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('housenumber')->nullable();
            $table->string('addressline1')->nullable();
            $table->string('addressline2')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();            
            $table->string('postcode')->nullable();
            $table->string('country')->nullable();
            $table->boolean('profile_visibility')->default('1');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_profiles');
    }
}
