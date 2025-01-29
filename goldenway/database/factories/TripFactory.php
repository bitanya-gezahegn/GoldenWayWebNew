<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Route;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'route_id' => Route::factory(),
            'date' => $this->faker->date(),
            'departure_time' => $this->faker->time(),
            'arrival_time' => $this->faker->time(),
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'capacity' => $this->faker->numberBetween(10, 50),
        ];
    }
}
