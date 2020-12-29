<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable=['nomProducto', 'categoria_id', 'especie_id', 'foto', 'costo', 'descripcion', 'existencias'];

    public function pedidos(){
    	return $this->belongsToMany(Pedido::class);
    }
}
