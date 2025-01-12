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
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->unsignedBigInteger('article_id')->default(1)->change(); // Exemple : défaut à 1
            $table->integer('quantity');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
        Schema::table('paniers', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->default(1)->change(); // Exemple : valeur par défaut 1
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('paniers');
        Schema::table('paniers', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->nullable(false)->change(); // Revenir à l'état précédent
        });
    }
};