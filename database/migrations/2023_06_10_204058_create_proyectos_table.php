<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('proyectos', function (Blueprint $table) {
            $table->id();
            $table->text('titulo');
            $table->dateTime('fecha_entrega', $precision = 0)->nullable();
            $table->string('estatus', 20)->nullable();
            $table->tinyInteger('entrega')->nullable(); // 1 = Primer entrega, 2 = Segunda entrega, 3 = Entrega final
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuario que creo el proyecto
            $table->string('hashname', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('proyectos');
    }
};
