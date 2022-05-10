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
            $table->string('menuImage')->nullable();
            $table->string('PK_menuID')->primary();
            $table->string('menuName', 50)->default('Default menu');
            $table->text('description', 50);
            $table->float('price')->default(0);
            $table->unsignedInteger('totalOrders')->default(0);
            $table->string('FK_categoryCode', 4)->nullable();
            $table->string('FK_cuisineCode', 4)->nullable();
            $table->timestamps();

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
