<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createventasstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('ventass', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('productos_id')->unsigned();
            $table->date('fecha');
            //$table->string('fecha',100);
            $table->integer('clientess_id')->unsigned();


            //--------------------
            //$table->primary('id');
            $table->foreign('productos_id')->references('id')->on('productos');
            $table->foreign('clientess_id')->references('id')->on('clientess');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('ventass');
    }
}
