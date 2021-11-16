<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblLoginLog extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_login_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id')->nullable();
            $table->string('user_action')->nullable();
            $table->dateTime('action_datetime', 0)->nullable($value = true);
            $table->string('logged_device')->nullable();
            $table->string('logged_browser')->nullable();
            $table->string('logged_os')->nullable();;
            $table->ipAddress('logged_ip')->nullable($value = true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_login_log');
    }
}
