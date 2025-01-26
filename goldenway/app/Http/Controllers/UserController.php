<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Schedule;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Refund;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Display all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    // Update user details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string',
            'role' => 'required|string|in:register_officer,driver,ticket_officer',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->role = $request->input('role'); // Assuming 'role' corresponds to the user type

        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }

    public function booknow($scheduleId){
       
            $schedule = Schedule::findOrFail($scheduleId);
        
            // Get already booked seat numbers
            $bookedSeats = Ticket::where('schedule_id', $scheduleId)
                ->pluck('seat_number')
                ->toArray();
        
            // Assume total seats are 40 (update based on your logic)
            $totalSeats = range(1, 40);
        
            return view('booknow', [
                'schedule' => $schedule,
                'totalSeats' => $totalSeats,
                'bookedSeats' => $bookedSeats,
            ]);
        
        
    }
public function users_history()

    {
        $userId = Auth::id();
    
        // Fetch tickets with all necessary relationships, including refund
        $tickets = Ticket::with(['refund', 'schedule.trip.route', 'schedule.driver', 'payment'])
            ->where('customer_id', $userId)
            ->get();
    
    $refunds=Refund::find($userId);
 
        // Return the tickets to the view
        return view('userhistory', compact('tickets','refunds'));
    }
    
    public function requestRefund(Request $request)
    {
        $ticketId = $request->input('ticket_id');
        $reason = $request->input('reason');
    
        $ticket = Ticket::find($ticketId);
    
        if ($ticket && $ticket->status === 'completed' && !$ticket->refund) {
            Refund::create([
                'payment_id' => $ticket->payment_id,
                'customer_id' => $ticket->customer_id,
                'refund_amount' => $ticket->payment->amount,
                'reason' => $reason,
                'refund_status' => 'pending',
                'refund_date' => now(), // Set refund date to current timestamp
            ]);
    
            return response()->json(['success' => true]);
        }
    
        return response()->json(['success' => false, 'message' => 'Invalid request or refund already requested.']);
    }
    
    }
