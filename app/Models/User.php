<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'cliente'; // Nombre de la tabla en la base de datos

    protected $primaryKey = 'id_cliente'; // Nombre de la clave primaria

    public $timestamps = false; // Desactiva los timestamps por defecto

    protected $fillable = [
        'correo_cli',
        'contrasena_cli',
    ];

    protected $hidden = [
        'contrasena_cli', // Oculta la contraseña al serializar el modelo
    ];

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id_cliente';
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->id_cliente;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contrasena_cli;
    }
}