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
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dateTime('fecha_entrega_2', $precision = 0)->after('fecha_entrega')->nullable();
            $table->dateTime('fecha_entrega_3', $precision = 0)->after('fecha_entrega_2')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proyectos', function (Blueprint $table) {
            $table->dropColumn('fecha_entrega_2');
            $table->dropColumn('fecha_entrega_3');
        });
    }
};
