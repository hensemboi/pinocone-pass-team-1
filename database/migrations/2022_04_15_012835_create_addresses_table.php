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
        Schema::create('addresses', function (Blueprint $table) {
            $table->integer('PK_FK_userID');
            $table->tinyInteger('addressNo');
            $table->text('customAddress');
            $table->string('street', 50);
            $table->string('city', 30);
            $table->string('state', 30);
            
            $table->primary(['addressNo', 'PK_FK_userID']);
            $table->foreign('PK_FK_userID', 'FK_address_users')->references('pk_userid')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
};
