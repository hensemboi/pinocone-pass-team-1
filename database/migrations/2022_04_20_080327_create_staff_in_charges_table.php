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
        Schema::create('staff_in_charges', function (Blueprint $table) {
            $table->string('PK_FK_transactionID');
            $table->integer('PK_FK_staffID');

            $table->primary(['PK_FK_transactionID', 'PK_FK_staffID']);
            $table->foreign('PK_FK_transactionID', 'FK_staffInCharge_orders')->references('PK_transactionID')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_staffID', 'FK_staffInCharge_staffs')->references('PK_staffID')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_in_charges');
    }
};
