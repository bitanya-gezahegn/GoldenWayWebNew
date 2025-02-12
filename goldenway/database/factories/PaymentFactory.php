<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ticket_id' => Ticket::factory(), // Automatically creates a Ticket

            'tx_ref' => 'tx-' . $this->faker->unique()->randomNumber(5),
            'amount' => $this->faker->randomFloat(2, 100, 1000),
            'customer_id' => User::factory(), // Automatically creates a User
            'payment_status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
            'ticket_status' => $this->faker->randomElement(['checked', 'unchecked']),
            'payment_method' => $this->faker->randomElement(['credit_card', 'paypal', 'cash', 'bank_transfer']),
            'payment_date' => $this->faker->dateTimeThisYear(),

        ];
    }
}
