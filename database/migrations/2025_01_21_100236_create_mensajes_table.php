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
        Schema::create('mensajes', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->foreignId('grupo_id')->constrained()->onDelete('cascade'); // Clave foránea hacia la tabla grupos
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Clave foránea hacia la tabla users
            $table->text('texto'); // El texto del mensaje
            $table->string('file')->nullable(); // Para almacenar el archivo (si existe)
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensajes');
    }
};


