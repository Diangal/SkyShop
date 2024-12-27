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
        Schema::table('articles', function (Blueprint $table) {
            // Ajout d'une colonne 'image' à la table 'articles'
            $table->string('image')->nullable(); // La colonne peut être nullable

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Suppression de la colonne 'image' de la table 'articles'
            $table->dropColumn('image'); // Supprime la colonne
            //
        });
    }
};
