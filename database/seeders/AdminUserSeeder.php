<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Delete existing user if exists to avoid double hashing
        User::where('email', 'admin@ashlocs.co.uk')->delete();
        
        // Create new admin user (password will be hashed by model mutator)
        User::create([
            'name' => 'Admin',
            'email' => 'admin@ashlocs.co.uk',
            'password' => 'admin123',
            'role' => 'admin',
            'is_active' => true,
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@ashlocs.co.uk');
        $this->command->info('Password: admin123');
    }
}
