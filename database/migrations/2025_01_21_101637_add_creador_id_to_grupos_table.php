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
        Schema::table('grupos', function (Blueprint $table) {
            //
            $table->foreignId('creador_id')->constrained('users')->onDelete('cascade'); // Usuario que creó el grupo

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('grupos', function (Blueprint $table) {
            //
            $table->dropForeign(['creador_id']); // Elimina la relación de clave foránea
            $table->dropColumn('creador_id'); // Elimina la columna
        });
    }
};


