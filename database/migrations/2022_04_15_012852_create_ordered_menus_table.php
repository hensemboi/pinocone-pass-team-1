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
        Schema::create('ordered_menus', function (Blueprint $table) {
            $table->string('PK_FK_transactionID', 20);
            $table->string('PK_FK_menuID', 10);
            $table->unsignedSmallInteger('quantity')->default(1);
            $table->string('extraNote')->nullable();
            $table->float('itemsPrice');

            $table->primary(['PK_FK_transactionID', 'PK_FK_menuID']);
            $table->foreign('PK_FK_menuID', 'FK_menus_OrderedMenus')->references('pk_menuid')->on('menus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_transactionID', 'FK_orders_OrderedMenus')->references('pk_transactionid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordered_menus');
    }
};
