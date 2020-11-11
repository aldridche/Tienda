<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos'; // nombre de la tabla
    protected $primarykey = 'id';   //
    public $timestamps = false;

    protected $fillable = [
        'id', 'producto', 'disponibles','precioUnitario', 'iva', 'precioTotal'
    ];
    public function ventas(){
        // belongsto --- pertenece a
        return $this-> belongsto(Ventas::class);
    }
}
