<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaymentMethodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userPaymentMethod', function (Blueprint $table) {
            $table->integer('PK_FK_userID');
            $table->tinyInteger('PK_FK_paymentCode');
            $table->integer('cardNo');
            $table->float('balance');
            
            $table->primary(['PK_FK_paymentCode', 'PK_FK_userID']);
            $table->foreign('PK_FK_paymentCode', 'FK_userPaymentMethod_paymentMethod')->references('pk_paymentcode')->on('paymentMethod')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_userID', 'FK_userPaymentMethod_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userPaymentMethod');
    }
}
