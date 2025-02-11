<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log; 
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Payment;
use App\Models\Refund;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

header('Accept: application/json');
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
            return redirect()->route('payment.success')->with('success', 'Payment completed successfully!')->with('ticket',$ticket->id);
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
        $ticket_id=session('ticket');
        $ticket = Ticket::find($ticket_id);
            $userId=$ticket->customer_id;
        session()->put('userId', $userId);
        Auth::loginUsingId($userId);
        return view('payment.success');
    }

    public function error()
    {
        return view('payment.error')->with('message', 'There was an issue with your payment.');
    }

    public function updateTicketStatus($paymentId, Request $request)
    {
        $payment = Payment::find($paymentId);

        if ($payment) {
            Log::error("Payment found for ID: $paymentId");
           
        }
        if ($payment && $payment->payment_status == 'completed') {
            $payment->update(['ticket_status' => 'checked']);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
        public function requestRefund(Request $request)
        {
            $request->validate([
                'ticket_id' => 'required|exists:tickets,id',
                'reason' => 'nullable|string|max:255',
            ]);
    
            $ticket = Ticket::find($request->ticket_id);
    
            if (!$ticket) {
                return response()->json(['success' => false, 'message' => 'Ticket not found.'], 404);
            }
    
            $payment = $ticket->payment;
    
            if (!$payment) {
                return response()->json(['success' => false, 'message' => 'Payment not found.'], 404);
            }
    
            if ($payment->status === 'refunded') {
                return response()->json(['success' => false, 'message' => 'Refund has already been processed.'], 400);
            }
    
            $existingRefund = Refund::where('payment_id', $payment->id)->first();
    
            if ($existingRefund) {
                return response()->json(['success' => false, 'message' => 'Refund request already submitted.'], 400);
            }
    
            // Create the refund request
            Refund::create([
                'payment_id' => $payment->id,
                'customer_id' => $ticket->customer->id,
                'refund_amount' => $payment->amount,
                'reason' => $request->reason ?? null,
                'refund_status' => 'pending',
                'refund_date' => null,
            ]);
    
            // Update payment status
            $payment->update(['status' => 'refund_pending']);
    
            return response()->json(['success' => true, 'message' => 'Refund request submitted successfully.']);
        }
    
    
    public function cash($id)
{
    // Fetch the ticket data based on the ticket ID
    $ticket = Ticket::findOrFail($id);

    return view('ticket_officer.book_ticket_payment', compact('ticket'));
}public function processCashPayment(Request $request, $id)
{
    $ticket = Ticket::with(['customer', 'schedule.trip.route'])->findOrFail($id);

    $validatedData = $request->validate([
        'payment_method' => 'required',
        'payment_status' => 'required',
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $ticketOfficer = User::where('email', $validatedData['email'])
        ->where('role', 'ticket_officer')
        ->first();

    if (!$ticketOfficer || !Hash::check($validatedData['password'], $ticketOfficer->password)) {
        return back()->with('error', 'Invalid credentials or unauthorized user.');
    }

    Payment::create([
        'ticket_id' => $id,
        'customer_id' => $ticketOfficer->id,
        'amount' => $ticket->schedule->trip->price,
        'payment_method' => $validatedData['payment_method'],
        'payment_status' => $validatedData['payment_status'],
        'ticket_status' => 'unchecked',
        'tx_ref' => uniqid('tx_'),
    ]);

    $ticket->status = 'completed';
    $ticket->save();

    return redirect()->route('payment.cash.form', $id)->with('success', 'Payment recorded successfully.');
}

}

    