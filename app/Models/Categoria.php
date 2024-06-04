<?php

   namespace App\Models;

   use Illuminate\Database\Eloquent\Model;

   class Categoria extends Model
   {
       protected $table = 'categoria';
       protected $primaryKey = 'id_categoria';
       public $timestamps = false;

       protected $fillable = ['nombre_cat'];

       public function productos()
       {
           return $this->hasMany(Producto::class, 'id_categoria');
       }
   }
