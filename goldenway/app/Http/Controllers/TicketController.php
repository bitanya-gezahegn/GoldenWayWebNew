<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Ticket;
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
        $filePath = "qrcodes/ticket_{$ticket->id}.png";  // File path in public directory
        Storage::put('public/' . $filePath, $qrCodeImage);  // Store QR code in the public storage folder
        
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
}public function showBookingPage($scheduleId)
{
    // Find the schedule, ensuring it exists
    $schedule = Schedule::findOrFail($scheduleId);

    // Safely handle capacity
    $capacity = $schedule->trip->capacity ?? 50; // Default to 50 if null
    if (!is_numeric($capacity) || $capacity <= 0) {
        $capacity = 50; // Set a safe fallback
    }

    // Generate seat numbers based on capacity
    $totalSeats = range(1, $capacity);

    // Retrieve booked seats for the specific schedule
    $bookedSeats = Ticket::where('schedule_id', $scheduleId)
                         ->pluck('seat_number')
                         ->toArray();

    return view('booknow', compact('totalSeats', 'bookedSeats', 'schedule'));
}


}
