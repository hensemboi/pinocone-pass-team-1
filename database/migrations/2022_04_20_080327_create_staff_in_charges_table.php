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
            $table->string('PK_FK_transactionID', 20);
            $table->string('PK_FK_staffID', 20);

            $table->primary(['PK_FK_transactionID', 'PK_FK_staffID']);
            $table->foreign('PK_FK_transactionID', 'FK_orders_staffInCharge')->references('pk_transactionid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_staffID', 'FK_staffs_staffInCharge')->references('pk_staffid')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
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
