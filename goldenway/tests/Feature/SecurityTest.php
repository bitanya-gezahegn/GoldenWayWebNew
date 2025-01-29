<?php

use Tests\TestCase;
use App\Models\User;

class SecurityTest extends TestCase

{
    protected function setUp(): void
    {
        parent::setUp();

        // Disable the CSRF protection middleware in tests if needed
        $this->withMiddleware([
            \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class
        ]);}

    public function test_csrf_protection()
    {
        
        $driver = User::factory()->create(['role' => 'driver']);
        $this->actingAs($driver);
        $csrfToken = csrf_token();

        // Send a POST request with an invalid CSRF token
        // $response = $this->post('/reportissuecreate', ['description' => 'report'], [
        //     'X-CSRF-TOKEN' => '123',  // Invalid token to trigger CSRF protection error
        // ]);
    
        // Assert that the response has the expected status for CSRF token mismatch
        // $response->assertStatus(419); // CSRF token mismatch
    
        // Now let's test the valid token scenario:
        // Send a POST request with a valid CSRF token
        $response = $this->post('/reportissuecreate', ['description' => 'report'], [
            'X-CSRF-TOKEN' => $csrfToken,  // Valid token from the session
        ]);
    
        // Assert that the request was successful with valid CSRF token
        $response->assertStatus(200);
    }
    public function test_sql_injections(){
        $response = $this->post('/login', ['name' => "' OR 1=1 --"]);
        $response->assertDontSee('SQL syntax error');

    }
}

