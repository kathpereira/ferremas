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
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('id_pedido')->primary();
            $table->integer('id_cliente')->nullable()->index('fk_id_cliente_pedido_idx');
            $table->integer('id_vendedor')->nullable()->index('fk_id_vendedor_pedido_idx');
            $table->integer('id_producto')->nullable()->index('fk_id_producto_pedido_idx');
            $table->integer('cantidad')->nullable();
            $table->integer('total')->nullable();
            $table->dateTime('fecha_pedido')->nullable();
            $table->string('estado_pedido', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedido');
    }
};
