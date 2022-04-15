<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->string('PK_transactionID', 20)->primary();
            $table->integer('FK_userID')->nullable();
            $table->dateTime('dateTime');
            $table->tinyInteger('FK_paymentCode')->nullable();
            $table->text('extraNote')->nullable();
            $table->float('totalPrice');
            $table->integer('FK_voucherID')->nullable();
            $table->smallInteger('FK_deliveryCode')->nullable();
            
            $table->foreign('FK_deliveryCode', 'FK_orders_meansOfDelivery')->references('pk_deliverycode')->on('meansOfDelivery')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_paymentCode', 'FK_orders_paymentMethod')->references('pk_paymentcode')->on('paymentMethod')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_userID', 'FK_orders_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_voucherID', 'FK_orders_vouchers')->references('pk_voucherid')->on('vouchers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
