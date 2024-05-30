<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'administrador';

    protected $fillable = ['usuario_admin', 'correo_admin', 'contrasena_admin'];
}
