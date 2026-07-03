<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // No doctrine/dbal installed, so enum can't be altered via ->change().
        // Converting to a plain string keeps existing values working and allows
        // new roles (doctor/nurse/receptionist) without further migrations.
        DB::statement("ALTER TABLE users MODIFY COLUMN role VARCHAR(255) NOT NULL DEFAULT 'viewer'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin','editor','viewer') NOT NULL DEFAULT 'viewer'");
    }
};
