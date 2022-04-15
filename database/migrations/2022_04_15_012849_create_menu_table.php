<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('PK_menuID');
            $table->string('menuName', 50)->default('Default menu');
            $table->string('description', 50)->default('No description');
            $table->float('price')->default(0);
            $table->unsignedInteger('totalOrders')->default(0);
            $table->unsignedInteger('FK_categoryCode');
            $table->unsignedInteger('FK_cuisineCode');
            
            $table->foreign('FK_categoryCode', 'FK_categoryMenu')->references('pk_categorycode')->on('category')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_cuisineCode', 'FK_cuisineTypeMenu')->references('pk_cuisinecode')->on('cuisineType')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu');
    }
}
