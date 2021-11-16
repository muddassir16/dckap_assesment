<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQueries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_queries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_id')->nullable();
            $table->string('name',45)->nullable();
            $table->mediumText('description',45)->nullable();
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
        Schema::dropIfExists('tbl_queries');
    }
}
