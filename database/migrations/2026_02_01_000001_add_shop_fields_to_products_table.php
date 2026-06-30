<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'slug')) {
                $table->string('slug')->unique()->after('name');
            }
            if (!Schema::hasColumn('products', 'price')) {
                $table->decimal('price', 10, 2)->nullable()->after('description');
            }
            if (!Schema::hasColumn('products', 'image')) {
                $table->string('image')->nullable()->after('price');
            }
            if (!Schema::hasColumn('products', 'category')) {
                $table->string('category')->nullable()->after('image');
            }
            if (!Schema::hasColumn('products', 'stock')) {
                $table->integer('stock')->default(0)->after('category');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['slug', 'price', 'image', 'category', 'stock']);
        });
    }
};
