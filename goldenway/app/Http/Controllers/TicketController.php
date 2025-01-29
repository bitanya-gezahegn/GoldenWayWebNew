<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Ticket;
use App\Models\Refund;
use Illuminate\Support\Facades\Storage;


use Illuminate\Support\Facades\Log; 
use App\Models\Schedule;
use App\Models\Trip;

use Intervention\Image\Facades\Image;

class TicketController extends Controller
{ 
    public function bookTicket(Request $request, Schedule $schedule)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'seat_number' => 'required|integer',
        ]);
        
        $seatNumber = $validated['seat_number'];
        
        // Log the schedule ID to debug
        Log::info('Booking Ticket for Schedule:', ['schedule_id' => $schedule->id]);
        
        // Check if the seat is already booked for the given schedule
        $isSeatTaken = Ticket::where('schedule_id', $schedule->id)
                             ->where('seat_number', $seatNumber)
                             ->exists();
        
        if ($isSeatTaken) {
            return back()->withErrors(['seat_number' => 'This seat is already booked. Please select a different seat.']);
        }
        
        // Create a new ticket
        $ticket = Ticket::create([
            'schedule_id' => $schedule->id,
            'customer_id' => Auth::user()->id,
            'seat_number' => $seatNumber,
            'status' => 'booked',
            'qr_code' => '', // Placeholder for QR code path
        ]);
        
        // Prepare data for QR code
        $qrData = [
            'Ticket ID' => $ticket->id,
            'Schedule ID' => $ticket->schedule_id,
            'Seat Number' => $ticket->seat_number,
            'Customer ID' => $ticket->customer_id,
            'Status' => $ticket->status,
            'Booking Date' => $ticket->created_at->format('Y-m-d H:i:s'),
        ];
        
        $qrDataJson = json_encode($qrData);
        
        // Generate and store the QR code image
        $qrCodeImage = QrCode::format('png')->size(300)->generate($qrDataJson);
        if (!Storage::disk('public')->exists('qrcodes')) {
            Storage::disk('public')->makeDirectory('qrcodes');
        }
        $filePath = "qrcodes/ticket_{$ticket->id}.png";  // File path in public directory
        $stored = Storage::put('public/' . $filePath, $qrCodeImage);
        if (!$stored) {
            Log::error('Failed to store the QR code file.', ['filePath' => $filePath]);
            throw new Exception('Failed to store the QR code file.');
        } else {
            Log::info('QR code file stored successfully.', ['filePath' => $filePath]);
        }  // Store QR code in the public storage folder
        Log::info('Storage Path:', ['path' => storage_path()]);
Log::info('QR Code Path:', ['filePath' => $filePath]);

        
        // Update the ticket with the QR code path
        $ticket->update(['qr_code' => $filePath]);
        
        // Redirect to QR code display page
        return redirect()->route('generate.qr', ['ticketId' => $ticket->id])
                         ->with('success', 'Your ticket has been booked successfully!');
    }
    

    public function showQrCode($ticketId)
    {

        $ticket = Ticket::with(['customer', 'schedule.trip.route'])->findOrFail($ticketId);
    
        // Format the data for the view (optional)
        $departureTime =$ticket->schedule->trip->departure_time  ? $ticket->schedule->trip->departure_time : null;
        $arrivalTime =$ticket->schedule->trip->arrival_time  ? $ticket->schedule->trip->arrival_time : null;

    // Format the data for the view
    $ticketData = [
        'id' => $ticket->id,

        'name' => $ticket->customer->name,
        'origin' => $ticket->schedule->trip->route->origin,
        'bus_stop' => $ticket->schedule->trip->route->bus_stops,

        'destination' => $ticket->schedule->trip->route->destination,
        'seat_number' => $ticket->seat_number,
        'date' => $ticket->schedule->created_at ?$ticket->schedule->created_at : 'N/A',
        'departureTime' => $departureTime ? $departureTime: 'N/A',
        'arrivalTime' => $arrivalTime ? $arrivalTime: 'N/A',
        'price' => $ticket->schedule->trip->price,
    ];

        // Pass the ticket data to the view
     
         return view('tickets.qrcode', compact('ticket','ticketData')); // Pass ticket to view
     }

     public function downloadQr($ticketId)
{
    $ticket = Ticket::findOrFail($ticketId);
    
    // Get the path of the QR code image stored in the public storage
    $filePath = storage_path('app/public/' . $ticket->qr_code);
    
    if (file_exists($filePath)) {
        return response()->download($filePath);
    } else {
        return redirect()->back()->withErrors(['qr_code' => 'QR code not found.']);
    }
}
public function showBookingPage($scheduleId)
{
    $schedule = Schedule::findOrFail($scheduleId);

    $capacity = $schedule->trip->capacity ?? 50;
    if (!is_numeric($capacity) || $capacity <= 0) {
        $capacity = 50;
    }

    // Generate seat numbers
    $totalSeats = range(1, $capacity);

    // Retrieve seats with status 'booked' for the specific schedule
    $bookedSeats = Ticket::where('schedule_id', $scheduleId)
                         ->where('status', 'completed') // Only consider booked seats
                         ->pluck('seat_number')
                         ->toArray();

    return view('booknow', compact('totalSeats', 'bookedSeats', 'schedule'));
}
public function illitrate(){
    return view('ticket_officer.illitratecreate');
}


public function showRefundRequests()
{
    // Fetch refund requests with nested relationships
    $refunds = Refund::with([
        'customer',                     // Fetch customer details
        'payment',                      // Fetch payment details
        'customer.tickets.schedule.trip.route' // Nested: ticket -> schedule -> trip -> route
    ])
    ->where('refund_status', 'pending') // Fetch only pending refunds
    ->get();

    // Debugging output to check data structure (optional, only for debugging)
    // Remove or comment out this line to stop the dd from appearing above the table
    // dd($refunds); 

    // Return view with refunds
    return view('operations_officer.requestrefunds', compact('refunds'));
}


public function handleRefundRequest(Request $request)
{
    $request->validate([
        'refund_id' => 'required|exists:refunds,id',
        'action' => 'required|in:approve,reject',
    ]);

    $refund = Refund::findOrFail($request->refund_id);
    $refund->refund_status = $request->action === 'approve' ? 'approved' : 'rejected';
    $refund->refund_date = now();
    $refund->save();

    return response()->json(['success' => true, 'message' => 'Refund request processed successfully.']);
}

}
