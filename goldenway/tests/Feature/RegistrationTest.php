<?php

use Laravel\Fortify\Features;
use Laravel\Jetstream\Jetstream;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});


test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'phone' => '0948415610',
        'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature(),
        
    ]);

    // $this->assertAuthenticated();
    $response->assertRedirect(route('redirect', absolute: false));
});
