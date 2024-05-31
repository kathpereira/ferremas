<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bodeguero extends Model
{
    protected $table = 'bodeguero';

    protected $fillable = ['nombre_bod', 'correo_bod', 'contrasena_bod', 'id_sucursal'];

    public $timestamps = false; // Indica que no se utilizarán marcas de tiempo

    public function sucursal()
    {
        return $this->belongsTo('App\Models\Sucursal', 'id_sucursal');
    }
}
