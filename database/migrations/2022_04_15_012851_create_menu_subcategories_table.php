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
        // Schema::create('menu_subcategories', function (Blueprint $table) {
        //     // $table->unsignedInteger('PK_FK_subCategoryCode');
        //     // $table->unsignedInteger('PK_FK_menuID');
            
        //     // $table->primary(['PK_FK_subCategoryCode', 'PK_FK_menuID']);
        //     // $table->foreign('PK_FK_menuID', 'PK_FK_menuIDMenuSubcategories')->references('pk_menuid')->on('menus')->onDelete('cascade')->onUpdate('cascade');
        //     // $table->foreign('PK_FK_subCategoryCode', 'PK_FK_subCategoryCodeMenuSubcategories')->references('pk_subcategorycode')->on('sub_categories')->onDelete('cascade')->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_subcategories');
    }
};
