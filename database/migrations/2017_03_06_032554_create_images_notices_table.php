<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_notices', function (Blueprint $table) {
            $table->increments('id_NotImg');
            $table->integer('id_not')->unsigned();
            $table->foreign('id_not')->references('id_Not')->on('notices')->onDelete('cascade');;
            $table->integer('id_img')->unsigned();
            $table->foreign('id_img')->references('id_Img')->on('images')->onDelete('cascade');;
            //$table->boolean('status_notImg');
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
        Schema::dropIfExists('images_notices');
    }
}
