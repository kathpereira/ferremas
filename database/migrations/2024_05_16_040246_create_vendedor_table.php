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
        Schema::create('vendedor', function (Blueprint $table) {
            $table->integer('id_vendedor')->primary();
            $table->string('nombre_vendedor', 45)->nullable();
            $table->string('correo_vendedor', 45)->nullable();
            $table->string('contrasena_vendedor', 45)->nullable();
            $table->integer('id_sucursal')->nullable()->index('fk_id_sucursal_vendedor_idx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedor');
    }
};
