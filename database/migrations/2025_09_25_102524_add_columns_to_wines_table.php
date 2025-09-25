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
        Schema::table('wines', function (Blueprint $table) {
            if (!Schema::hasColumn('wines', 'description')) {
                $table->text('description')->nullable()->after('name');
            }
            if (!Schema::hasColumn('wines', 'image')) {
                $table->string('image')->nullable()->after('description');
            }
            if (!Schema::hasColumn('wines', 'glass_price')) {
                $table->decimal('glass_price', 8, 2)->after('image');
            }
            if (!Schema::hasColumn('wines', 'bottle_price')) {
                $table->decimal('bottle_price', 8, 2)->after('glass_price');
            }
            if (!Schema::hasColumn('wines', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('bottle_price');
            }
            if (!Schema::hasColumn('wines', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wines', function (Blueprint $table) {
            $table->dropColumn(['description', 'image', 'glass_price', 'bottle_price', 'is_active', 'sort_order']);
        });
    }
};
