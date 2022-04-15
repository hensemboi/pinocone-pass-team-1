<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_devices', function (Blueprint $table) {
            $table->integer('PK_FK_userID')->primary();
            $table->string('deviceNo', 50);
            $table->string('deviceOS', 50);
            $table->string('deviceName', 50);
            $table->string('webBrowser', 50);
            
            $table->foreign('PK_FK_userID', 'FK_userDevices_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_devices');
    }
};
