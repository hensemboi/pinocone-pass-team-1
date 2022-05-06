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
        Schema::create('memberships', function (Blueprint $table) {
            $table->integer('PK_FK_userID')->primary();
            $table->dateTime('startDate');
            $table->dateTime('expiryDate');
            $table->tinyInteger('active');
            $table->dateTime('next_reward_time')->nullable();
            
            $table->foreign('PK_FK_userID', 'FK_membership_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memberships');
    }
};
