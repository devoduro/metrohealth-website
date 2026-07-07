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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            // Controls what a user with this role can navigate to:
            // 'full' = unrestricted (admin/editor), 'clinical' = locked to own
            // mini-dashboard scoped to assigned clinic service(s) (like a doctor),
            // 'frontdesk' = broad patients/appointments access minus admin sections.
            $table->string('dashboard_scope')->default('frontdesk');
            $table->json('permissions')->nullable();
            $table->boolean('is_system')->default(false);
            $table->timestamps();
        });

        // Seed the roles that already exist as hardcoded strings elsewhere in the
        // app, plus the two newly requested roles — all through this one table
        // so RestrictStaffAccess and the staff admin UI can treat every role
        // (built-in or admin-created) the same way from here on.
        $now = now();
        DB::table('roles')->insert([
            ['name' => 'Admin', 'slug' => 'admin', 'dashboard_scope' => 'full', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Editor', 'slug' => 'editor', 'dashboard_scope' => 'full', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Viewer', 'slug' => 'viewer', 'dashboard_scope' => 'full', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Doctor', 'slug' => 'doctor', 'dashboard_scope' => 'clinical', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Nurse', 'slug' => 'nurse', 'dashboard_scope' => 'frontdesk', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Receptionist', 'slug' => 'receptionist', 'dashboard_scope' => 'frontdesk', 'permissions' => null, 'is_system' => true, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Physician Assistant (PA)', 'slug' => 'physician_assistant', 'dashboard_scope' => 'clinical', 'permissions' => null, 'is_system' => false, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sonographer', 'slug' => 'sonographer', 'dashboard_scope' => 'clinical', 'permissions' => null, 'is_system' => false, 'created_at' => $now, 'updated_at' => $now],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
