<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
    use HasFactory;

    protected $table = 'cliente'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_cliente'; // Nombre de la clave primaria

    public $timestamps = false; // Desactiva los timestamps por defecto

    protected $fillable = [
        'nombre_cli',
        'apellido_cli',
        'correo_cli',
        'contrasena_cli',
        'direccion_cli',
        'telefono_cli',
    ];

    protected $hidden = [
        'contrasena_cli', // Oculta la contraseña al serializar el modelo
    ];

    // Relación con la tabla de teléfonos
    public function telefono()
    {
        return $this->hasOne(Telefono::class, 'id_telefono', 'id_telefono');
    }
}
