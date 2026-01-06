<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 1 admin user
        User::factory()->create([
            'name' => 'Admin TripMe',
            'email' => 'admin@tripme.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'phone' => '081234567890',
        ]);

        // Create 10 regular users
        User::factory(10)->create([
            'role' => 'user',
        ]);


        
        // Seed destinations with coordinates
        $this->call(DestinationSeeder::class);

        // Seed travel options
        $this->call(TravelSeeder::class);
    }
}
