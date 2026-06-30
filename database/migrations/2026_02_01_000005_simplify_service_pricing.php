<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            // Drop the hair length specific pricing columns
            $table->dropColumn(['price_short', 'price_medium', 'price_long', 'price_extra_long']);
            
            // Add simple min/max price range
            $table->decimal('price_min', 8, 2)->nullable()->after('description');
            $table->decimal('price_max', 8, 2)->nullable()->after('price_min');
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['price_min', 'price_max']);
            
            $table->decimal('price_short', 8, 2)->nullable()->after('description');
            $table->decimal('price_medium', 8, 2)->nullable()->after('price_short');
            $table->decimal('price_long', 8, 2)->nullable()->after('price_medium');
            $table->decimal('price_extra_long', 8, 2)->nullable()->after('price_long');
        });
    }
};
