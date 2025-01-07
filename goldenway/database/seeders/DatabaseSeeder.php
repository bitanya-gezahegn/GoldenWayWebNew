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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ]);

        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer',
            'email_verified_at' => now(),
            'password' => bcrypt('customer123'),
        ]);
        User::factory()->create([
            'name' => 'Driver',
            'email' => 'driver@gmail.com',
            'role' => 'driver',
            'email_verified_at' => now(),
            'password' => bcrypt('driver123'),
        ]);
        User::factory()->create([
            'name' => 'Operations Officer',
            'email' => 'oofficer@gmail.com',
            'role' => 'operations_officer',
            'email_verified_at' => now(),
            'password' => bcrypt('oofficer123'),
        ]);
        User::factory()->create([
            'name' => 'Ticket Officer',
            'email' => 'tofficer@gmail.com',
            'role' => 'ticket_officer',
            'email_verified_at' => now(),
            'password' => bcrypt('tofficer123'),
        ]);
    }
}
