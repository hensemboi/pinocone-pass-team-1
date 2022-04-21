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
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('PK_staffID', 20)->primary();
            $table->string('firstName', 50)->nullable();
            $table->string('lastName', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('passwordHash', 50)->nullable();
            $table->string('phoneNo', 50)->nullable();
            $table->string('FK_positionCode')->nullable();
            $table->timestamps();
            
            $table->foreign('FK_positionCode', 'FK_positionCodeStaff')->references('pk_positioncode')->on('positions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
};
