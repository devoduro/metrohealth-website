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
        Schema::create('clinic_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $names = [
            'General Medical Care',
            'Family Medicine Specialist Clinic',
            'ENT Specialist Clinic',
            'Physician Specialist Clinic',
            'Physician Specialist and Geriatric Clinic',
            'Urology Clinic',
            'Eye Clinic',
            'Well Baby Visit',
            'Paediatric Clinic',
            'Wellines Visit',
            'Dietetics',
        ];

        foreach ($names as $index => $name) {
            \Illuminate\Support\Facades\DB::table('clinic_services')->insert([
                'name' => $name,
                'order' => $index,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_services');
    }
};
