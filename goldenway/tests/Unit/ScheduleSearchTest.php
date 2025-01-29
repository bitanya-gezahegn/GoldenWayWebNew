<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Schedule;

use App\Models\User;

uses(Tests\TestCase::class, RefreshDatabase::class);

it('searches schedules by origin', function () {
    $user = User::factory()->create(['role'=>'customer']);
$this->actingAs($user);

    
    $route = Route::factory()->create(['origin' => 'Addis Ababa', 'destination' => 'Bahir Dar']);
    $trip = Trip::factory()->create(['route_id' => $route->id]);
    $schedule = Schedule::factory()->create(['trip_id' => $trip->id]);

   
    $response = $this->post('/search-schedule');

    
    $response->assertStatus(200);
    $response->assertViewHas('schedules', function ($schedules) use ($schedule) {
        return $schedules->contains($schedule);
    });
});

it('searches schedules by destination', function () {
    $user = User::factory()->create(['role'=>'admin']);
$this->actingAs($user);
    
    $route = Route::factory()->create(['origin' => 'Addis Ababa', 'destination' => 'Bahir Dar']);
    $trip = Trip::factory()->create(['route_id' => $route->id]);
    $schedule = Schedule::factory()->create(['trip_id' => $trip->id]);

   
    $response = $this->post('/search-schedule');

 
    $response->assertStatus(200);
    $response->assertViewHas('schedules', function ($schedules) use ($schedule) {
        return $schedules->contains($schedule);
    });
});

it('searches schedules by date', function () {
    $user = User::factory()->create(['role'=>'customer']);
$this->actingAs($user);
    $route = Route::factory()->create();
    $trip = Trip::factory()->create(['route_id' => $route->id]);
    $schedule = Schedule::factory()->create([
        'trip_id' => $trip->id,
        'created_at' => now(),
    ]);

   
    $response = $this->post('/search-schedule');

    
    $response->assertStatus(200);
    $response->assertViewHas('schedules', function ($schedules) use ($schedule) {
        return $schedules->contains($schedule);
    });
});

it('searches schedules by multiple filters', function () {
    $user = User::factory()->create(['role'=>'customer']);
    $this->actingAs($user);
   
    $route = Route::factory()->create(['origin' => 'Addis Ababa', 'destination' => 'Bahir Dar']);
    $trip = Trip::factory()->create(['route_id' => $route->id, 'date' => now()->toDateString()]);
    $schedule = Schedule::factory()->create([
        'trip_id' => $trip->id,
        'created_at' => now(),
    ]);

    $response = $this->post('/search-schedule');

    $response->assertStatus(200);
    $response->assertViewHas('schedules', function ($schedules) use ($schedule) {
        return $schedules->contains($schedule);
    });
});
