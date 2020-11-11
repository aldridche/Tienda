<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createclientesstable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('clientess', function (Blueprint $table) {
            // 'producto','precioUnitario', 'iva', 'precioTotal'
            $table->increments('id');
            $table->string('nombre', 100);
            $table->string('apellido', 100);
            $table->decimal('edad',7,2);
            $table->string('RFC',100);
            $table->string('domicilio',100);
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
        Schema::drop('clientes');
    }
}
