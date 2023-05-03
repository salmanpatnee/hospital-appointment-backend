<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => 'password', 
            'user_type' => 1
        ]);
        
        User::factory()->create([
            'name' => 'Patient',
            'email' => 'patient@gmail.com',
            'password' => 'password', 
        ]);

        \App\Models\Doctor::factory(5)->create();

    }
}
