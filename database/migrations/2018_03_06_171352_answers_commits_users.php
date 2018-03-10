<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnswersCommitsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers_commits_users', function(Blueprint $table){
           $table->increments('id');
           $table->integer('id_ans')->unsigned();
           $table->foreign('id_ans')->references('id')->on('answers')->onDelete('cascade'); 

           $table->integer('id_com')->unsigned();
           $table->foreign('id_com')->references('id')->on('commits')->onDelete('cascade');
          
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
        Schema::dropIfExists('answers_commits_users');
    }
}
