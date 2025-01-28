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
        Schema::create('tableros', function (Blueprint $table) {
            $table->id(); // La columna 'id' como clave primaria
            $table->unsignedBigInteger('users_id'); // Definir la columna 'users_id' como tipo BigInteger
            $table->string('nombre_tablero'); // Columna 'nombre_tablero'
            $table->timestamps();

            // Establecer la relación de clave foránea con la tabla 'users'
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tableros');
    }
};
