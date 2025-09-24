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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nom du menu (ex: "Menu du midi", "Carte principale")
            $table->string('type'); // Type de menu (midi, groupe, carte, etc.)
            $table->text('description')->nullable(); // Description du menu
            $table->json('items'); // Items du menu en JSON
            $table->decimal('price', 8, 2)->nullable(); // Prix si applicable
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
        Schema::dropIfExists('menus');
    }
};
