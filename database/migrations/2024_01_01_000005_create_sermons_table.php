<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sermons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('preacher');
            $table->string('scripture_reference')->nullable();
            $table->date('sermon_date');
            $table->text('description')->nullable();
            $table->string('audio_url')->nullable();
            $table->string('video_url')->nullable();
            $table->longText('transcript')->nullable();
            $table->string('series')->nullable();
            $table->json('tags')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sermons');
    }
};
