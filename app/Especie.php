<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{

	protected $fillable = ['especie'];

    public function producto(){
    	return $this->hasMany(Productos::class);
    }
}