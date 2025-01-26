<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Refund;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function initialize($id)
    {
        // Retrieve ticket information
        $ticket = Ticket::with('schedule.trip', 'customer')->find($id);

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Generate a unique transaction reference
        $tx_ref = 'tx-' . uniqid();

        // Save payment data in the database
        $payment = Payment::create([
            'ticket_id' => $ticket->id,
            'tx_ref' => $tx_ref,
            'amount' => $ticket->schedule->trip->price ?? 0,
            'customer_id' => $ticket->customer->id,
            'status' => 'pending', // Initial status
        ]);

        // Prepare payment data
        $paymentData = [
            'name' => $ticket->customer->name ?? 'Unknown',
            'email' => $ticket->customer->email ?? 'Unknown',
            'amount' => $ticket->schedule->trip->price ?? 0,
            'phone_number' => '0940420602',
            'currency' => 'ETB',
            'tx_ref' => $tx_ref,
            'return_url' => "http://localhost:8000/payment/callback/{$tx_ref}",
               'customization' => [
                'title' => 'Payment',
                'description' => 'Thanks for your payment.',
            ],
        ];

        // Call the payment service
        $response = app('App\Services\ChapaService')->initializePayment($paymentData);

        if (isset($response['error']) && $response['error']) {
            return redirect()->back()->with('error', $response['message']);
        }

        return redirect($response['data']['checkout_url'])->with('success', 'Redirecting to payment gateway...');
    }
    public function callback(Request $request, string $tx_ref)
    {
        // Call the verifyTransaction method from ChapaService
        $response = app('App\Services\ChapaService')->verifyTransaction($tx_ref);
    
        // Access the status
        $status = $response['status'] ?? null; // Use null coalescing to avoid errors if 'status' is missing
    
        // Handle based on status
        if ($status === 'success') {
            // Retrieve the payment record by the transaction reference
            $payment = Payment::where('tx_ref', $tx_ref)->with('ticket')->first();
    
            if ($payment) {
                // Update the payment status to 'completed'
                $payment->update([
                    'status' => 'completed',
                    'payment_date' => now(),
                ]);
    
                // Retrieve and update the ticket associated with the payment
                $ticket = $payment->ticket;
                if ($ticket) {
                    $ticket->update(['status' => 'completed']);
                }
            }
    
            // Redirect to success route
            return redirect()->route('payment.success')->with('success', 'Payment completed successfully!');
        } elseif ($status === 'failed') {
            // Retrieve the payment record by the transaction reference
            $payment = Payment::where('tx_ref', $tx_ref)->first();
    
            if ($payment) {
                // Update the payment status to 'failed'
                $payment->update(['status' => 'failed']);
            }
    
            // Redirect to error route
            return redirect()->route('payment.error')->with('error', 'Payment failed. Please try again.');
        } else {
            // Unknown status
            return redirect()->route('payment.error')->with('error', 'An unexpected error occurred. Please contact support.');
        }
    }
    

    public function success()
    {
        
        // Retrieve payment data from the session
       
     

        return view('payment.success');
    }

    public function error()
    {
        return view('payment.error')->with('message', 'There was an issue with your payment.');
    }

    public function updateTicketStatus($paymentId, Request $request)
    {
        $payment = Payment::find($paymentId);

        if ($payment && $payment->status == 'completed') {
            $payment->ticket->update(['status' => 'completed']);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }

    public function requestRefund(Request $request)
    {
        $ticket = Ticket::find($request->ticket_id);

        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        $payment = $ticket->payment;

        if (!$payment) {
            return redirect()->back()->with('error', 'Payment not found.');
        }

        if ($payment->status === 'refunded') {
            return redirect()->back()->with('error', 'Refund has already been processed.');
        }

        $refund = Refund::create([
            'payment_id' => $payment->id,
            'customer_id' => $ticket->customer->id,
            'refund_amount' => $payment->amount,
            'reason' => $request->reason ?? null,
            'refund_status' => 'pending',
            'refund_date' => null,
        ]);

        $payment->update(['status' => 'refund_pending']);

        return redirect()->back()->with('success', 'Refund request submitted successfully.');
    }
}

    