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
        Schema::create('producto', function (Blueprint $table) {
            $table->integer('id_producto')->primary();
            $table->string('nombre_prod', 45)->nullable();
            $table->string('descripcion', 45)->nullable();
            $table->integer('precio')->nullable();
            $table->integer('stock')->nullable();
            $table->string('marca')->nullable();
            $table->blob('imagen')->nullable();
            $table->integer('id_categoria')->nullable()->index('fk_id_categoria_producto_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};
