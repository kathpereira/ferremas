<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImagenToProductosTable extends Migration
{
    public function up()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->string('imagen')->nullable();
        });
    }

    public function down()
    {
        Schema::table('producto', function (Blueprint $table) {
            $table->dropColumn('imagen');
        });
    }
}