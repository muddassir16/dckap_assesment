<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_customers', function (Blueprint $table) {
            $table->id();
            $table->string('username',45)->nullable();
            $table->string('password',45)->nullable();
            $table->tinyInteger('user_role')->default('1')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->integer('zipcode')->nullable();
            $table->tinyInteger('record_status')->default('1')->nullable();
            $table->dateTime('created_at', 0)->nullable($value = true);
            $table->dateTime('modified_at', 0)->nullable($value = true);
            $table->dateTime('deleted_at', 0)->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_customers');
    }
}
