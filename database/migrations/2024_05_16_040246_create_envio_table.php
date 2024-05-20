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
        Schema::create('envio', function (Blueprint $table) {
            $table->integer('id_envio')->primary();
            $table->integer('id_pedido')->nullable()->index('fk_id_pedido_envio_idx');
            $table->integer('id_cliente')->nullable()->index('fk_id_cliente_envio_idx');
            $table->string('direccion_envio', 100)->nullable();
            $table->dateTime('fecha_envio')->nullable();
            $table->string('estado_envio', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('envio');
    }
};
