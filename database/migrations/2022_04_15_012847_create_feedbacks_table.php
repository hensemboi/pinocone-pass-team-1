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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->string('PK_FK_transactionID', 20)->primary();
            $table->text('textFeedback')->nullable();
            $table->tinyInteger('menuRating')->nullable();
            $table->tinyInteger('deliveryRating')->nullable();
            $table->tinyInteger('serviceRating')->nullable();
            
            $table->foreign('PK_FK_transactionID', 'FK_feedbacks_orders')->references('pk_transactionid')->on('orders')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
};
