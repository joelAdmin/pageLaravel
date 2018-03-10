<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CommitsNoticesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commits_notices_users', function(Blueprint $table){
           $table->increments('id'); 

           $table->integer('id_com')->unsigned();
           $table->foreign('id_com')->references('id')->on('commits')->onDelete('cascade');

           $table->integer('id_not')->unsigned();
           $table->foreign('id_not')->references('id_Not')->on('notices')->onDelete('cascade');

           $table->integer('id_use')->unsigned();
           $table->foreign('id_use')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('commits_notices_users');
    }
}
