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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom de l'image
            $table->string('filename'); // Nom du fichier
            $table->string('path'); // Chemin vers l'image
            $table->string('alt_text')->nullable(); // Texte alternatif
            $table->string('category')->nullable(); // Catégorie (carousel, galerie, etc.)
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0); // Ordre d'affichage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
