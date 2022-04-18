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
        Schema::create('positions', function (Blueprint $table) {
            $table->increments('PK_positionCode');
            $table->string('name', 50)->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('FK_divisionCode');
            
            $table->foreign('FK_divisionCode', 'FK_divisionCodePosition')->references('pk_divisioncode')->on('divisions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('positions');
    }
};
