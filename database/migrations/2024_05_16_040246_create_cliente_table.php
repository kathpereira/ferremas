<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->integer('id_cliente')->primary();
            $table->string('nombre_cli', 45)->nullable();
            $table->string('apellido_cli', 45)->nullable();
            $table->string('correo_cli', 45)->nullable();
            $table->string('contrasena_cli', 100)->nullable();
            $table->string('direccion_cli', 100)->nullable();
            $table->bigInteger('telefono_cli')->nullable();
            $table->integer('id_telefono')->nullable()->index('fk_id_tipo_telefono_cli_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
  
    }
};
