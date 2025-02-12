<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Schedule;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'schedule_id'=>Schedule::factory(),
            'customer_id'=>User::factory(),
            'seat_number'=>$this->faker->numberBetween(10, 50),
            'status'=>'booked',
            'qr_code'=>'qr-' . $this->faker->unique()->randomNumber(5),
           
        ];
    }
}
