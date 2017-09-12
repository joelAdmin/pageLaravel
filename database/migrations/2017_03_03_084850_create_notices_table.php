<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id_Not');
            $table->integer('id_cat')->unsigned();
            $table->foreign('id_cat')->references('id_Cat')->on('category_notices');
            $table->integer('id_sco')->unsigned();
            $table->foreign('id_sco')->references('id_Sco')->on('scope_notices');
            $table->string('anteater_not')->nullable();
            $table->longText('title_not');
            $table->longText('subtitle_not');
            $table->string('author_not');
            $table->string('source_not')->nullable();
            $table->string('url_source_not')->nullable();
            $table->longText('inlet_not');
            $table->longText('content_not');
            //$table->string('image_not');
            $table->enum('type_not', ['normal', 'interest']);
            $table->boolean('estatus_not');
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
        Schema::dropIfExists('notices');
    }
}
