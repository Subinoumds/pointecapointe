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
        Schema::table('menu_items', function (Blueprint $table) {
            if (!Schema::hasColumn('menu_items', 'type')) {
                $table->string('type')->default('plat')->after('name');
            }
            if (!Schema::hasColumn('menu_items', 'description')) {
                $table->text('description')->nullable()->after('type');
            }
            if (!Schema::hasColumn('menu_items', 'price')) {
                $table->decimal('price', 8, 2)->after('description');
            }
            if (!Schema::hasColumn('menu_items', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('price');
            }
            if (!Schema::hasColumn('menu_items', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_items', function (Blueprint $table) {
            $table->dropColumn(['type', 'description', 'price', 'is_active', 'sort_order']);
        });
    }
};
