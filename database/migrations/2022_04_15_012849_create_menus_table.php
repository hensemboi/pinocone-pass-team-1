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
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('PK_menuID')->primary();
            $table->string('menuName', 50)->default('Default menu');
            $table->string('description', 50)->default('No description');
            $table->float('price')->default(0);
            $table->unsignedInteger('totalOrders')->default(0);
            $table->unsignedInteger('FK_categoryCode');
            $table->unsignedInteger('FK_cuisineCode');

            $table->foreign('FK_categoryCode', 'FK_categoryMenu')->references('pk_categorycode')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('FK_cuisineCode', 'FK_cuisineTypeMenu')->references('pk_cuisinecode')->on('cuisine_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
