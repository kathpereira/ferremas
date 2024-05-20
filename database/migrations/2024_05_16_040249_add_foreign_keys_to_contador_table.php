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
        Schema::table('contador', function (Blueprint $table) {
            $table->foreign(['id_sucursal'], 'fk_id_sucursal_cont')->references(['id_sucursal'])->on('sucursal')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contador', function (Blueprint $table) {
            $table->dropForeign('fk_id_sucursal_cont');
        });
    }
};
