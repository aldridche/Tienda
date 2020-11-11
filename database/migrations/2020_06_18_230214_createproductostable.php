<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createproductostable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('productos', function (Blueprint $table) {
            // 'producto','precioUnitario', 'iva', 'precioTotal'
            $table->increments('id');
            $table->string('producto', 100);
            $table->decimal('disponibles',7,2);
            $table->decimal('precioUnitario',7,2);
            $table->decimal('iva',7,2);
            $table->decimal('precioTotal',7,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('productos');
    }
}
