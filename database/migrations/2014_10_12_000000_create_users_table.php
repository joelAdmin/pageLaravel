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
            $table->string('name')->nullable();
            $table->string('user')->unique();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('type', ['user', 'admin']);
            $table->boolean('active')->default(false);
            $table->boolean('estatus')->default(true);
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::drop('users');
    }
}
