<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditColumPrividerInUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //se utilza este metodo porque tengo una colummna enum en mi tabla y me produce un error con Doctrine\DBAL
    public function __construct() 
    {
        \DB::getDoctrineSchemaManager()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
    }

    public function up()
    {
        Schema::table('users', function(Blueprint $table){
            $table->bigInteger('provider_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->string('provider_id')->nullable()->change();
        });
    }
}
