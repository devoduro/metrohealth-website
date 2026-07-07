<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        $now = now();
        DB::table('service_categories')->insert([
            ['name' => 'Clinic', 'slug' => 'clinic', 'order' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Labs', 'slug' => 'labs', 'order' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Procedure', 'slug' => 'procedure', 'order' => 2, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_categories');
    }
};
