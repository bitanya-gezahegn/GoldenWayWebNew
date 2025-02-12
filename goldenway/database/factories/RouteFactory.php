<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $ethiopianCities = [
            'Addis Ababa', 'Adama', 'Bahir Dar', 'Dire Dawa', 'Hawassa', 'Mekele', 'Gondar', 'Jimma',
            'Debre Berhan', 'Harar', 'Shashemene', 'Nekemte', 'Hosaena', 'Dessie', 'Arba Minch', 'Debre Markos',
            'Sebeta', 'Bishoftu', 'Assela', 'Wolkite', 'Gode', 'Gambela', 'Dilla', 'Ambo', 'Bule Hora',
            'Sodo', 'Metu', 'Burayu', 'Axum', 'Adigrat', 'Chiro', 'Ziway', 'Mojo', 'Butajira', 'Fiche',
            'Goba', 'Yabelo', 'Mizan Teferi', 'Woldia', 'Shire', 'Debre Tabor', 'Agaro', 'Kombolcha',
            'Ginir', 'Gorgora', 'Alem Tena', 'Sawla', 'Dangla', 'Bati', 'Kemise'
        ];
        return [
            'origin' => $this->faker->randomElement($ethiopianCities), 
            'destination' => $this->faker->randomElement($ethiopianCities), 
            'bus_stops' => json_encode("{$this->faker->randomElement($ethiopianCities)}, {$this->faker->randomElement($ethiopianCities)}"),
            'distance' => $this->faker->numberBetween(50, 1000),
        ];
    }
}
