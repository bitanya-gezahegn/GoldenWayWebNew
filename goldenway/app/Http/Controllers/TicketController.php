<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Ticket;
use App\Models\Refund;
use App\Models\Schedule;
use App\Models\Payment;
use App\Models\Trip;
use Exception;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function bookTicket(Request $request, Schedule $schedule)
    {
        $validated = $request->validate([
            'seat_number' => 'required|integer',
        ]);
    
        $seatNumber = $validated['seat_number'];
    
        // Check if seat is already booked
        $isSeatTaken = Ticket::where('schedule_id', $schedule->id)
            ->where('seat_number', $seatNumber)
            ->exists();
    
        if ($isSeatTaken) {
            return back()->withErrors(['seat_number' => 'This seat is already booked.']);
        }
    
        // Create QR Data
        $qrData = json_encode([
            'Schedule ID' => $schedule->id,
            'Seat Number' => $seatNumber,
            'Customer ID' => Auth::user()->id,
        ]);
    
        // Ensure QR code directory exists
        $directory = storage_path('app/public/qrcodes/');
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    
        // Generate a unique filename
        $fileName = 'ticket_' . uniqid() . '.png';
        $filePath = $directory . $fileName;
    
        // Generate QR Code
        QrCode::format('png')->size(300)->generate($qrData, $filePath);
    
        // Store relative path for retrieval
        $qrCodePath = 'qrcodes/' . $fileName;
    
        // Create the ticket with the QR code
        $ticket = Ticket::create([
            'schedule_id' => $schedule->id,
            'customer_id' => Auth::user()->id,
            'seat_number' => $seatNumber,
            'status' => 'booked',
            'qr_code' => $qrCodePath, // Save the generated QR code path
        ]);
    
        return redirect()->route('generate.qr', ['ticketId' => $ticket->id])
            ->with('success', 'Your ticket has been booked successfully!');
    }
    public function showQrCode($ticketId)
    {
        $ticket = Ticket::with(['customer', 'schedule.trip.route'])->findOrFail($ticketId);

        $ticketData = [
            'id' => $ticket->id,
            'name' => $ticket->customer->name,
            'origin' => $ticket->schedule->trip->route->origin,
            'distance' => $ticket->schedule->trip->route->distance,
            'bus_stop' => $ticket->schedule->trip->route->bus_stops,
            'bus' => $ticket->schedule->bus->bus_type,
            'destination' => $ticket->schedule->trip->route->destination,
            'seat_number' => $ticket->seat_number,
            'date' => $ticket->schedule->trip->date ? \Carbon\Carbon::parse($ticket->schedule->trip->date)->format('Y-m-d') : 'N/A',
            'departureTime' => $ticket->schedule->trip->departure_time ? \Carbon\Carbon::parse($ticket->schedule->trip->departure_time)->format('H:i') : 'N/A',
            'arrivalTime' => $ticket->schedule->trip->arrival_time ? \Carbon\Carbon::parse($ticket->schedule->trip->arrival_time)->format('H:i') : 'N/A',
            'price' => $ticket->schedule->trip->price,
        ];
        

        return view('tickets.qrcode', compact('ticket', 'ticketData'));
    }

    public function downloadQr($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $filePath = storage_path('app/public/' . $ticket->qr_code);

        if (file_exists($filePath)) {
            return response()->download($filePath);
        } else {
            return back()->withErrors(['qr_code' => 'QR code not found.']);
        }
    }

   
public function showBookingPage($scheduleId)
{
    $schedule = Schedule::findOrFail($scheduleId);
    $capacity = is_numeric($schedule->trip->capacity) && $schedule->trip->capacity > 0
        ? $schedule->trip->capacity
        : 50;

    // Delete tickets that have been booked for more than 3 days
    Ticket::where('schedule_id', $scheduleId)
        ->where('status', 'booked')
        ->where('created_at', '<', Carbon::now()->subDays(3))
        ->delete();

    $totalSeats = range(1, $capacity);

    // Fetch booked and completed seats separately
    $bookedSeats = Ticket::where('schedule_id', $scheduleId)
        ->where('status', 'booked')
        ->pluck('seat_number')
        ->toArray();

    $completedSeats = Ticket::where('schedule_id', $scheduleId)
        ->where('status', 'completed')
        ->pluck('seat_number')
        ->toArray();

    return view('booknow', compact('totalSeats', 'bookedSeats', 'completedSeats', 'schedule'));
}


    public function illitrate()
    {
        return view('ticket_officer.illitratecreate');
    }

    public function showRefundRequests()
    {
        $refunds = Refund::with([
            'customer',
            'payment',
            'customer.tickets.schedule.trip.route'
        ])
            ->where('refund_status', 'pending')
            ->get();

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
   public function bookTicketAndPaymentForm()
    {
        $schedules = Schedule::with('route', 'bus')->get();
        $availableSeats = range(1, 50); // Assume seat range from 1 to 50
        $bookedSeats = Ticket::whereIn('status', ['booked', 'completed'])->pluck('seat_number')->toArray();
        $availableSeats = array_diff($availableSeats, $bookedSeats);
        
        $tickets = Ticket::with('schedule')->get();
    
        return view('ticket_officer.ticket_payment', compact('schedules', 'availableSeats', 'tickets'));
    }
    
    public function storeTicket(Request $request)
    {
        $validatedData = $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'seat_number' => 'required|integer',
        ]);
    
        $ticket = Ticket::create([
            'schedule_id' => $validatedData['schedule_id'],
            'seat_number' => $validatedData['seat_number'],
            'status' => 'booked',
            'qr_code' => uniqid('qr_'),
            'customer_id' => Auth::id(),
        ]);
    
        return back()->with('success', 'Ticket successfully booked!');
    }
    
    public function storePayment(Request $request)
    {
        $validatedData = $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'payment_method' => 'required|string',
            'amount' => 'required|numeric',
        ]);
    
        Payment::create([
            'ticket_id' => $validatedData['ticket_id'],
            'customer_id' => Auth::id(),
            'amount' => $validatedData['amount'],
            'payment_method' => $validatedData['payment_method'],
            'payment_status' => 'completed',
            'ticket_status' => 'unchecked',
            'tx_ref' => uniqid('tx_'),
        ]);
    
        return back()->with('success', 'Payment successfully processed!');
    }}
