<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Route;
use App\Models\Trip;
use App\Models\Schedule;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Support\Facades\Storage;


uses(RefreshDatabase::class);

it('completes an end-to-end flow: login, search schedule, book trip, select seat, pay, and generate QR code', function () {
    // Arrange: Create user and data for the flow
    $user = User::factory()->create([
        'email' => 'testuser@example.com',
        'password' => bcrypt('password123'),
    ]);
    $this->actingAs($user);
    $route = Route::factory()->create(['origin' => 'City A', 'destination' => 'City B']);
    $trip = Trip::factory()->create(['route_id' => $route->id, 'price' => 100]);
    $schedule = Schedule::factory()->create(['trip_id' => $trip->id]);

    // Act 1: Login
    $loginResponse = $this->post('/login', [
        'email' => $user->email,
        'password' => 'password123',
    ]);

    $loginResponse->assertRedirect('/dashboard');
    $this->assertAuthenticatedAs($user);

    // Act 2: Search for schedule
    $searchResponse = $this->post('/search-schedule', [
        'origin' => 'City A',
        'destination' => 'City B',
    ]);

    $searchResponse->assertStatus(200);
    $searchResponse->assertViewHas('schedules');
    $schedules = $searchResponse->viewData('schedules');
    $this->assertCount(1, $schedules);

    // Act 3: Book a trip
    $bookNowResponse = $this->get('/book-now/' . $schedule->id);
    $bookNowResponse->assertStatus(200);
    $bookNowResponse->assertViewHasAll(['totalSeats', 'bookedSeats', 'schedule']);

    // Act 4: Select seat and book ticket
    $seatSelectionResponse = $this->post('/book-ticket/' . $schedule->id, [
        'seat_number' => 1,
    ]);

    $seatSelectionResponse->assertRedirect(route('generate.qr', ['ticketId' => Ticket::first()->id]));

    // Verify seat booking
    $this->assertDatabaseHas('tickets', [
        'schedule_id' => $schedule->id,
        'seat_number' => 1,
        'customer_id' => $user->id,
        'status' => 'booked',
    ]);

    $ticket = Ticket::first();
    $this->get(route('generate.qr', ['ticketId' => $ticket->id]))
         ->assertViewIs('tickets.qrcode')
         ->assertViewHasAll(['ticket', 'ticketData']);

    // Assert: QR code exists in storage
    // Storage::disk('public')->assertExists($ticket->qr_code);

    // Act 6: Proceed to payment initialization
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

        $this->app->instance('App\Services\ChapaService', $mockChapaService);

    $this->post("/payment/initialize/{$ticket->id}")
         ->assertRedirect('https://chapa.co/checkout');

    // Act 7: Simulate payment callback
    $tx_ref = Payment::first()->tx_ref;
    $this->post(route('payment.callback'), [
        'tx_ref' => $tx_ref,
    ])->assertRedirect(route('payment.success'))
      ->assertSessionHas('success', 'Your ticket has been booked successfully.');

    // Assert: Payment and ticket are updated in the database
    $ticket->refresh();
    $payment = Payment::first();
    expect($payment->payment_status)->toBe('completed');
    expect($ticket->status)->toBe('booked'); // Ticket status remains consistent
});
