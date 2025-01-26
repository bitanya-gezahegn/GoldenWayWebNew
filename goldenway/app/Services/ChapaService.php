<?php
namespace App\Services;

use GuzzleHttp\Client;

class ChapaService
{
    protected $client;
    protected $baseUrl = 'https://api.chapa.co/v1/';
    protected $secretKey = 'CHASECK_TEST-4PHobpgbWkAiY9EZs9NsRknEOdlFbIDf';

    public function __construct()
    {
        // Initialize Guzzle HTTP client with a base URI and timeout
        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 10.0,
        ]);
    }

    // Initialize payment
    public function initializePayment($data)
    {
        try {
            $response = $this->client->post('transaction/initialize', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->secretKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }

    // Verify payment transaction
    public function verifyTransaction(string $tx_ref)
    {
        try {
            // Make the API call to Chapa (adjust URL and parameters according to Chapa API documentation)
            $response = $this->client->get('transaction/verify/' . $tx_ref, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->secretKey,
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
            ];
        }
    }
}
