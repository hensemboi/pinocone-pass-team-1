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
        Schema::create('pinopays', function (Blueprint $table) {
            $table->integer('FK_userID')->primary();
            $table->float('balance');
            $table->string('PIN');
            
            $table->foreign('FK_userID', 'FK_pinopay_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinopays');
    }
};
