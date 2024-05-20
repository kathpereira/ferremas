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
        Schema::create('bodeguero', function (Blueprint $table) {
            $table->integer('id_bodeguero')->primary();
            $table->string('nombre_bod', 45)->nullable();
            $table->string('correo_bod', 45)->nullable();
            $table->string('contrasena_bod', 45)->nullable();
            $table->integer('id_sucursal')->nullable()->index('fk_id_sucur_bod_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bodeguero');
    }
};
