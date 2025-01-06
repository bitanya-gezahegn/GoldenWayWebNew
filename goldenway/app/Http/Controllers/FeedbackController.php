<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Schedule;
use App\Models\User;
use App\Models\Rating;

class FeedbackController extends Controller
{
    public function showFeedbackForm($scheduleId)
    {
        // Retrieve the schedule and associated driver/customer
        $schedule = Schedule::find($scheduleId);

        if (!$schedule) {
            return redirect()->back()->with('error', 'Schedule not found.');
        }

        $driver = $schedule->driver; // Assuming there's a relationship defined for the driver
        $customer = Auth::user(); // Assuming the authenticated user is the customer

        if (!$driver || !$customer) {
            return redirect()->back()->with('error', 'Driver or customer not found.');
        }

        return view('feedback', [
            'scheduleId' => $scheduleId,
            'driverId' => $driver->id,
            'driverName' => $driver->name,
            'customerId' => $customer->id,
        ]);
    }
    public function submitFeedback(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'driver_id' => 'required|exists:users,id',
            'customer_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'nullable|string|max:255',
        ]);

        // Save the feedback in the ratings table
        Rating::create([
            'driver_id' => $request->driver_id,
            'customer_id' => $request->customer_id,
            'rating' => $request->rating,
            'feedback' => $request->feedback,
        ]);

        // Redirect with a success message
        session()->flash('success', 'Your feedback has been submitted successfully.');

        // Debug session
       
        return redirect()->route('feedback.form', $request->schedule_id);
    }    
    public function showFeedbackView()
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to view feedback');
        }
    
        // Get the logged-in driver's ID
        $driverId = Auth::id();
    
        // Retrieve feedbacks for the driver, including the customer information
        $feedbacks = Rating::with('customer')  // Eager load customer details
                           ->where('driver_id', $driverId)
                           ->get();
    
        // Return the view with feedbacks
        return view('driver.feedbackview', compact('feedbacks'));
    }
    
}
