<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['iva', 'total','direccion','estatus','metodo_pago'];
    //
    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function productos(){
    	return $this->belongsToMany(Producto::class)->withPivot('cantidad');
    }
}
