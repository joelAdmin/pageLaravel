<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id_Men');
            $table->string('etiqueta_men');
            $table->longText('content_men')->nullable();
            $table->integer('position_men')->nullable();
            $table->string('url_men')->nullable();
            $table->string('class_men')->nullable();
            $table->string('event_men')->nullable();
            $table->boolean('active_men');
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
        Schema::dropIfExists('menus');
    }
}
