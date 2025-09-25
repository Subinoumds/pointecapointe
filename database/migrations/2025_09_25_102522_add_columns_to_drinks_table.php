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
        Schema::table('drinks', function (Blueprint $table) {
            if (!Schema::hasColumn('drinks', 'category')) {
                $table->string('category')->after('name');
            }
            if (!Schema::hasColumn('drinks', 'description')) {
                $table->text('description')->nullable()->after('category');
            }
            if (!Schema::hasColumn('drinks', 'is_active')) {
                $table->boolean('is_active')->default(true)->after('description');
            }
            if (!Schema::hasColumn('drinks', 'sort_order')) {
                $table->integer('sort_order')->default(0)->after('is_active');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->dropColumn(['category', 'description', 'is_active', 'sort_order']);
        });
    }
};
