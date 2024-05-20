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
        Schema::table('envio', function (Blueprint $table) {
            $table->foreign(['id_cliente'], 'fk_id_cliente_envio')->references(['id_cliente'])->on('cliente')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['id_pedido'], 'fk_id_pedido_envio')->references(['id_pedido'])->on('pedido')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('envio', function (Blueprint $table) {
            $table->dropForeign('fk_id_cliente_envio');
            $table->dropForeign('fk_id_pedido_envio');
        });
    }
};
