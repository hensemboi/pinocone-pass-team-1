<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->integer('PK_voucherID')->primary();
            $table->string('name', 50);
            $table->date('startDate');
            $table->date('expiryDate');
            $table->time('duration');
            $table->tinyInteger('availability');
            $table->tinyInteger('membership');
            $table->tinyInteger('FK_voucherTypeCode');
            
            $table->foreign('FK_voucherTypeCode', 'FK_vouchers_voucherType')->references('pk_vouchertypecode')->on('voucherType')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}