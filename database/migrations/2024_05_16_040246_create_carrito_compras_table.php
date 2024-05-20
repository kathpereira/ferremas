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
        Schema::create('carrito_compras', function (Blueprint $table) {
            $table->integer('id_carrito_compras')->primary();
            $table->integer('id_cliente')->nullable()->index('fk_id_cliente_carr_idx');
            $table->integer('id_producto')->nullable()->index('fk_id_producto_carr_idx');
            $table->integer('cantidad_producto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carrito_compras');
    }
};
