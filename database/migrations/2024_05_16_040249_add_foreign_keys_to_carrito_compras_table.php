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
        Schema::table('carrito_compras', function (Blueprint $table) {
            $table->foreign(['id_cliente'], 'fk_id_cliente_carr')->references(['id_cliente'])->on('cliente')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['id_producto'], 'fk_id_producto_carr')->references(['id_producto'])->on('producto')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('carrito_compras', function (Blueprint $table) {
            $table->dropForeign('fk_id_cliente_carr');
            $table->dropForeign('fk_id_producto_carr');
        });
    }
};
