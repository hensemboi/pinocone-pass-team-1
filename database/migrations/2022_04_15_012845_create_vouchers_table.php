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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->string('PK_voucherID', 10)->primary();
            $table->string('name', 50);
            $table->date('startDate');
            $table->date('expiryDate');
            $table->time('duration');
            $table->tinyInteger('availability');
            $table->tinyInteger('membership');
            $table->tinyInteger('FK_voucherTypeCode')->nullable();
            
            $table->foreign('FK_voucherTypeCode', 'FK_vouchers_voucherType')->references('pk_vouchertypecode')->on('voucher_types')->onDelete('cascade')->onUpdate('cascade');
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
};
