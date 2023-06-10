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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('matricula', 10)->nullable();
            $table->string('email')->unique();
            $table->string('grupo', 5)->nullable();
            $table->string('carrera', 5)->nullable();
            $table->foreignId('turno_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('carrera_id')->constrained()->onDelete('cascade'); 
            $table->foreignId('esquema_id')->default(4)->constrained()->onDelete('cascade'); 
            $table->foreignId('grado_id')->nullable()->constrained()->onDelete('cascade'); 
            $table->string('procedencia', 7)->nullable();
            $table->string('usuario_captura');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void{

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['turno_id']);
            $table->dropForeign(['carrera_id']);
            $table->dropForeign(['esquema_id']);
            $table->dropForeign(['grado_id']);
        });

        Schema::dropIfExists('users');
    }
};
