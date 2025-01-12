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
        Schema::create('paiement_payteches', function (Blueprint $table) {
            $table->id();
            $table->string('ref_command')->unique();
            $table->string('status')->default('pending'); // success, cancelled, etc.
            $table->unsignedBigInteger('article_id');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');    
            $table->timestamps();
        });
        Payment::create([
            'ref_command' => $randomString,
            'status' => 'pending',
            'article_id' => $article->id,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiement_payteches');
    }
};
