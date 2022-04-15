<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('PK_staffID');
            $table->string('firstName', 50)->nullable();
            $table->string('lastName', 50)->nullable();
            $table->string('email', 50)->nullable();
            $table->string('passwordHash', 50)->nullable();
            $table->string('phoneNo', 50)->nullable();
            $table->unsignedInteger('FK_positionCode');
            
            $table->foreign('FK_positionCode', 'FK_positionCodeStaff')->references('pk_positioncode')->on('position')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
