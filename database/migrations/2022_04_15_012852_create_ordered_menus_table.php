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
            $table->unsignedInteger('PK_FK_menuID');
            $table->unsignedSmallInteger('quantity')->default(0);
            $table->string('extraNote')->nullable();
            
            $table->primary(['PK_FK_transactionID', 'PK_FK_menuID']);
            $table->foreign('PK_FK_menuID', 'PK_FK_menuIDOrderedMenu')->references('pk_menuid')->on('menus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_transactionID', 'PK_FK_transactionIDOrderedMenu')->references('pk_transactionid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
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
