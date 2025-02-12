<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Bus;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Payment;



class TestingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(50)->create();
        Bus::factory()->count(10)->create();
        Route::factory()->count(10)->create();
        Trip::factory()->count(10)->create();
        Schedule::factory()->count(10)->create();
        Ticket::factory()->count(10)->create();
        Payment::factory()->count(10)->create();
    }
}
