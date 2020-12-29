<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    //
    protected $fillable=['nomProducto', 'categoria_id', 'especie_id', 'foto', 'costo', 'descripcion', 'existencias'];

    public function Categoria(){
    return $this->belongsTo(Categoria::class);
    }

    public function Especie(){
    return $this->belongsTo(Especie::class);
    }
}

