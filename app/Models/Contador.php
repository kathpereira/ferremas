<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contador extends Model
{
    protected $table = 'contador';
    
    public $timestamps = false;

    protected $fillable = ['nombre_cont', 'correo_cont', 'contrasena_cont', 'id_sucursal'];

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'id_sucursal');
    }
}
