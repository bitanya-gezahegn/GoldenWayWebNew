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
        $request->validate([
            'route_id' => 'required|exists:routes,id',
            'departure_time' => 'required|date_format:H:i',
            'arrival_time' => 'required|date_format:H:i',
            'price' => 'required|numeric|min:0',
            'capacity' => 'required|integer|min:1',
        ]);

        Trip::create($request->all());

        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }

    /**
     * Show the form for editing a trip.
     */
    public function edit(Trip $trip)
    {
        $routes = Route::all(); // To display route options in the edit form
        return view('trips.edit', compact('trip', 'routes'));
    }

    public function update(Request $request, Trip $trip)
{$trip->route_id = $request->route_id;
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
}
