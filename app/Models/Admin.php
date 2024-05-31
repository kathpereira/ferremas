<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Admin extends Authenticatable implements AuthenticatableContract
{
    use HasFactory;

    protected $table = 'administrador'; // Nombre de la tabla de administradores

    protected $primaryKey = 'id_administrador'; // Clave primaria de la tabla

    public $timestamps = false; // Indica si la tabla tiene los campos 'created_at' y 'updated_at'

    protected $fillable = ['correo_admin', 'contrasena_admin']; // Campos que pueden ser asignados en masa

    protected $hidden = ['contrasena_admin']; // Campos ocultos
}