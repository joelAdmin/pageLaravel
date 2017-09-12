nullable<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submenus', function (Blueprint $table) {
            $table->increments('id_Sub');
            $table->integer('id_men')->unsigned();
            $table->foreign('id_men')->references('id_Men')->on('menus');
            $table->string('etiqueta_sub');
            $table->longText('content_sub')->nullable();
            $table->integer('position_sub')->nullable();
            $table->string('url_sub')->nullable();
            $table->string('class_sub')->nullable();
            $table->string('event_sub')->nullable();
            $table->boolean('active_sub');
            $table->softDeletes();
            $table->timestamps(); //created_at updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submenus');
    }
}
