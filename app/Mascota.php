<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    //
    protected $fillable=['nombre', 'sexo', 'nomDueno', 'especie', 'edad', 'servicio', 'cita', 'hora', 'amistoso', 'comentarios'];
}
