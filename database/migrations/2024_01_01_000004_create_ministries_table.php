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
        Schema::create('ministries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('category', ['inter-generational', 'generational'])->default('inter-generational');
            $table->string('ministry_category')->nullable();
            $table->string('age_range')->nullable();
            $table->text('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('image')->nullable();
            $table->string('leader')->nullable();
            $table->string('leader_phone')->nullable();
            $table->string('leader_picture')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('meeting_schedule')->nullable();
            $table->string('location')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministries');
    }
};
