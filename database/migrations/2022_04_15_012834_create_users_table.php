<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('PK_userID')->primary();
            $table->string('username')->unique();
            $table->string('firstName', 50);
            $table->string('lastName', 50);
            $table->date('dateOfBirth');
            $table->string('email', 50)->unique();
            $table->string('password', 50);
            $table->float('incentives')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
