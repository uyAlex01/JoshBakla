<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        // Check if admin already exists to prevent duplicates
        if (!User::where('email', 'admin@events.com')->exists()) {
            User::create([
                'name' => 'System Admin',
                'email' => 'admin@events.com',
                'password' => Hash::make('SecurePassword123!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]);
            
            $this->command->info('Admin user created successfully!');
        } else {
            $this->command->warn('Admin user already exists!');
        }
    }
}