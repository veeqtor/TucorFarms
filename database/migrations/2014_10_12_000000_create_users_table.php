<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->boolean('gender');
            $table->string('email')->unique();
            $table->boolean('role_id')->index()->default(true);
            $table->boolean('is_active')->default(false);
            $table->string('address')->nullable();
            $table->string('address2')->nullable();
            $table->string('delivery')->nullable();
            $table->string('payment')->nullable();
            $table->integer('phone')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
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
