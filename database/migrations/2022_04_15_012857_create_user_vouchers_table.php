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
        Schema::create('user_vouchers', function (Blueprint $table) {
            $table->integer('PK_FK_userID');
            $table->integer('PK_FK_voucherID');
            
            $table->primary(['PK_FK_userID', 'PK_FK_voucherID']);
            $table->foreign('PK_FK_userID', 'FK_userVouchers_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_voucherID', 'FK_userVouchers_vouchers')->references('pk_voucherid')->on('vouchers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_vouchers');
    }
};
