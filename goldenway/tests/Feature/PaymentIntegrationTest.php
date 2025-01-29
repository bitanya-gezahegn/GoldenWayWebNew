<?php
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

use App\Models\Route;
use App\Models\Trip;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Payment;

uses(RefreshDatabase::class);

it('processes payment using Chapa API and updates ticket status', function () {
    // Arrange: Create necessary entities
    $customer = User::factory()->create();
    $route = Route::factory()->create();
    $trip = Trip::factory()->create(['route_id' => $route->id]);
    $schedule = Schedule::factory()->create(['trip_id' => $trip->id]);
    $ticket = Ticket::factory()->create([
        'schedule_id' => $schedule->id,
        'customer_id' => $customer->id,
        'status' => 'booked',
    ]);

    // Mock the Chapa service
    $mockChapaService = Mockery::mock('App\Services\ChapaService');
    $mockChapaService->shouldReceive('initializePayment')
        ->once()
        ->with(Mockery::on(function ($paymentData) use ($schedule) {
            return $paymentData['amount'] === $schedule->trip->price;
        }))
        ->andReturn([
            'status' => 'success',
            'data' => [
                'checkout_url' => 'https://chapa.co/checkout',
            ],
        ]);

    // Bind the mocked service to the container
    $this->app->instance('App\Services\ChapaService', $mockChapaService);

    // Act: Initialize payment
    $response = $this->post(route('payment.initialize', ['id' => $ticket->id]));

    // Assert: Check the redirect to Chapa's checkout URL
    $response->assertRedirect('https://chapa.co/checkout');

    // Simulate the callback from Chapa
    $payment = Payment::where('ticket_id', $ticket->id)->first();
    $callbackResponse = $this->post(route('payment.callback'), ['tx_ref' => $payment->tx_ref]);
    // Log::info('tx_ref:', [$payment->tx_ref]);
    // Refresh the ticket to reflect updated status
    $ticket->refresh();

    // Assert: Verify the ticket's payment and booking statuses are updated
    $callbackResponse->assertRedirect(route('payment.success'));
    expect($ticket->status)->toBe('booked'); // Assuming 'booked' remains after payment
    expect($payment->payment_status)->toBe('completed');
});
