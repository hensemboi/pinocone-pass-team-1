<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menuSubcategories', function (Blueprint $table) {
            $table->unsignedInteger('PK_FK_subCategoryCode');
            $table->unsignedInteger('PK_FK_menuID');
            
            $table->primary(['PK_FK_subCategoryCode', 'PK_FK_menuID']);
            $table->foreign('PK_FK_menuID', 'PK_FK_menuIDMenuSubcategories')->references('pk_menuid')->on('menu')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('PK_FK_subCategoryCode', 'PK_FK_subCategoryCodeMenuSubcategories')->references('pk_subcategorycode')->on('subCategories')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menuSubcategories');
    }
}
