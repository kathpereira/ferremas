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
        Schema::create('contador', function (Blueprint $table) {
            $table->integer('id_contador')->primary();
            $table->string('nombre_cont', 45)->nullable();
            $table->string('correo_cont', 45)->nullable();
            $table->string('contrasena_cont', 45)->nullable();
            $table->integer('id_sucursal')->nullable()->index('fk_id_sucursal_cont_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contador');
    }
};
