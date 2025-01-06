<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Route;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of trips.
     */
    public function index()
    {
        $trips = Trip::with('route')->get();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new trip.
     */
    public function create()
    {
        $routes = Route::all();
        return view('trips.create', compact('routes'));
    }

    /**
     * Store a newly created trip in storage.
     */
    public function store(Request $request)
{
    // Debug the request data
   
    // Validation
    $request->validate([
        'route_id' => 'required|exists:routes,id',
        'date' => 'required|date_format:Y-m-d',
        'departure_time' => 'required|date_format:H:i',
        'arrival_time' => 'required|date_format:H:i',
        'price' => 'required|numeric|min:0',
        'capacity' => 'required|integer|min:1',
    ]);

    // After validation, you can save the trip:
    Trip::create([
        'route_id' => $request->route_id,
        'date' => $request->date,
        'departure_time' => $request->departure_time,
        'arrival_time' => $request->arrival_time,
        'price' => $request->price,
        'capacity' => $request->capacity,
    ]);

    // Redirect after successful creation
    return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
}

    public function edit(Trip $trip)
    {
        $routes = Route::all(); // To display route options in the edit form
        return view('trips.edit', compact('trip', 'routes'));
    }

    public function update(Request $request, Trip $trip)
{$trip->route_id = $request->route_id;
    $trip->date = $request->date;
    
    $trip->departure_time = $request->departure_time;
    $trip->arrival_time = $request->arrival_time;
    $trip->price = $request->price;
    $trip->capacity = $request->capacity;
    
    if ($trip->isDirty()) { // Check if any attributes have been modified
        $trip->save();
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully!');
  
    } else {
        dd('No changes detected');
    }

    
}

    public function destroy(Trip $trip)
    {
        $trip->delete();
        return redirect()->route('trips.index')->with('success', 'Trip deleted successfully!');
    }

    public function getSeats($tripId)
    {
        // Fetch the trip
        $trip = Trip::with('seats')->findOrFail($tripId);

        // Return the seat data
        return response()->json([
            'seats' => $trip->seats, // Assuming the seats relationship exists
            'capacity' => $trip->capacity,
        ]);
    }

    public function bookSeats(Request $request, $tripId)
    {
        $request->validate([
            'seats' => 'required|array',
            'seats.*' => 'integer',
        ]);

        $trip = Trip::findOrFail($tripId);

        foreach ($request->seats as $seatId) {
            $seat = $trip->seats()->findOrFail($seatId);
            if ($seat->status !== 'available') {
                return response()->json(['error' => "Seat $seatId is not available."], 400);
            }

            // Mark seat as booked
            $seat->update(['status' => 'booked']);
        }

        return response()->json(['success' => 'Seats booked successfully!']);
    }
}
