<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function initialize($id)
    {
        // Retrieve ticket information
        $info = Ticket::find($id);

        if (!$info) {
            return redirect()->back()->with('error', 'Ticket not found.');
        }

        // Generate a unique transaction reference
        $tx_ref = 'tx-' . uniqid();

        // Save payment data in the database
        Payment::create([
            'ticket_id' => $info->id,
            'tx_ref' => $tx_ref,
            'amount' => $info->schedule->trip->price ?? 0,
            'customer_id' => $info->customer->id, // Add this line
            'status' => 'pending',
        ]);
        
        // Prepare payment data
        $paymentData = [
            'name' => $info->customer->name ?? 'Unknown',
            'email' => $info->customer->email ?? 'Unknown',
            'amount' => $info->schedule->trip->price ?? 0,
            'phone_number' => '0940420602',
            'currency' => 'ETB',
            'tx_ref' => $tx_ref,
            'callback_url' => route('payment.callback'),
            'return_url' => route('payment.success'),
            'customization' => [
                'title' => 'Payment',
                'description' => 'Thank you for your payment.',
            ],
        ];

        // Call the payment service
        $response = app('App\Services\ChapaService')->initializePayment($paymentData);

        if (isset($response['error']) && $response['error']) {
            return redirect()->back()->with('error', $response['message']);
        }

        return redirect($response['data']['checkout_url'])->with('success', 'Redirecting to payment gateway...');
    }
    public function callback(Request $request)
    {
        $tx_ref = $request->input('tx_ref');
    
        if (!$tx_ref) {
            return redirect()->route('payment.error')->with('error', 'Transaction reference missing.');
        }
    
        $payment = Payment::where('tx_ref', $tx_ref)->first();
    
        if (!$payment) {
            return redirect()->route('payment.error')->with('error', 'Invalid transaction reference.');
        }
    
        // Update payment status (you can add API verification here)
        $payment->update([
            'status' => 'completed',
            'payment_date' => now(),
        ]);
    
        $ticket = $payment->ticket;
    
        if (!$ticket) {
            return redirect()->route('payment.error')->with('error', 'Ticket not found.');
        }
    
        $allinfo = [
            'ticket_id' => $ticket->id,
            'customer_id' => $ticket->customer->id,
            'amount' => $payment->amount,
            'payment_status' => $payment->status,
            'payment_date' => $payment->payment_date,
        ];
    
        // Persist data in session
        session(['paymentData' => $allinfo]);
    
        // Redirect to the success page with the message
        return redirect()->route('payment.success')->with('success', 'Your ticket has been booked successfully.');
    }
    
    public function success()
    {
        // Retrieve payment data from session
        $paymentData = session('paymentData');
    
      
    
        // Display success message along with payment data
        return view('payment.success', compact('paymentData'))->with('message', session('success'));
    }
    

    public function error()
    {
        return view('payment.error')->with('message', 'There was an issue with your payment.');
    }

    public function updateTicketStatus($paymentId, Request $request)
    {
        $payment = Payment::find($paymentId);

        if ($payment && $payment->ticket_status == 'unchecked') {
            // Update the ticket status to 'checked'
            $payment->ticket_status = 'checked';
            $payment->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}
