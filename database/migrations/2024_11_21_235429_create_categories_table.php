<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Categorie;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Création de la table 'categories' si elle n'existe pas
        if (!Schema::hasTable('categories')){
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('nom_categorie')->nullable();
                $table->text('desc_categorie');
                $table->timestamps();
            });
        }

        // Ajout de la clé étrangère dans la table 'articles' si elle existe
        if (Schema::hasTable('articles')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->foreignId('categorie_id')
                      ->constrained('categories')
                      ->cascadeOnDelete();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Suppression de la clé étrangère de la table 'articles'
        if (Schema::hasTable('articles')) {
            Schema::table('articles', function (Blueprint $table) {
                $table->dropForeign(['categorie_id']); // Supprime la contrainte
                $table->dropColumn('categorie_id');    // Supprime la colonne
            });
        }

        // Suppression de la table 'categories'
        Schema::dropIfExists('categories');
    }
};


