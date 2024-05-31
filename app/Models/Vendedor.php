<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table = 'vendedor';

    public $timestamps = false; 

    protected $fillable = ['nombre_vendedor', 'correo_vendedor', 'contrasena_vendedor', 'id_sucursal'];

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'id_sucursal');
    }
}
