<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    //
    protected $table = 'clientess'; // nombre de la tabla
    protected $primarykey = 'id';   //
    public $timestamps = false;

    protected $fillable = [
        'id', 'nombre','apellido', 'edad', 'RFC', 'domicilio'
    ];

    public function ventas(){
        // belongsto --- pertenece a
        return $this-> belongsto(Ventas::class);
    }
}
