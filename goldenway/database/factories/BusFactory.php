<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bus>
 */
class BusFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'plate_number' => $this->faker->unique()->regexify('[A-Z]{3} [0-9]{3}'),

            'bus_type' => $this->faker->randomElement(['Sprinter', 'Coaster', 'Bus']),
            
        ];
    }
}
