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
        Schema::create('midday_menu_cards', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Ex: "Menu du marché"
            $table->string('subtitle')->nullable(); // Ex: "Prix : 16,50 € (entrée + plat ou plat + dessert)"
            $table->decimal('price', 8, 2)->nullable(); // Prix numérique
            $table->json('items'); // Array des items (entrée, plat, dessert)
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('midday_menu_cards');
    }
};
