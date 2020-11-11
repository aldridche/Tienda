<?php

namespace App\Models\Ventas;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    //
    protected $table = 'ventass'; // nombre de la tabla
    protected $primarykey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id', 'productos_id','fecha', 'clientess_id'
    ];

    public function producto(){
        // hasmany - tiene muchos
        return $this-> hasmany(Producto::class);
    }
    public function clientes(){
        // hasmany - tiene muchos
        return $this-> hasmany(Clientes::class);
    }
}
