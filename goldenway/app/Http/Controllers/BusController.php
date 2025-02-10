<?php

namespace App\Http\Controllers;
use App\Models\Bus;

use Illuminate\Http\Request;

class BusController extends Controller
{
    public function bus(){
        $buses=Bus::all();
        return view('buses.bus',compact('buses'));
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'bus_type' => 'required|string',
            'plate_number' => 'required|string|unique:buses,plate_number',
        ]);
    
        // Store the bus record in the database
        Bus::create([
            'bus_type' => $request->input('bus_type'),
            'plate_number' => $request->input('plate_number'),
        ]);
    
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Bus added successfully!');
    }

    public function editBus($id)
    {
        // Find the bus record by ID
        $bus = Bus::find($id);
    
        // Check if the bus exists
        if (!$bus) {
            return redirect()->route('buses.index')->with('error', 'Bus not found!');
        }
    
        // Return the edit view with the bus details
        return view('buses.edit', compact('bus'));
    }
    public function editBusConfirm(Request $request, $id)
{
    // Find the bus record by ID using the primary key 'id'
    $bus = Bus::where('id', $id)->first();

    if (!$bus) {
        return redirect()->route('buses.index')->with('error', 'Bus not found!');
    }

    // Validate the request data
    $request->validate([
        'bus_type' => 'required|string',
        'plate_number' => 'required|string|unique:buses,plate_number,' . $id . ',id', // Ignore the current bus's plate number
    ]);

    // Update the bus details
    $bus->update([
        'bus_type' => $request->bus_type,
        'plate_number' => $request->plate_number,
    ]);
    return redirect()->route('bus')->with('success', 'Bus updated successfully!');
}
public function destroy($id)
{
    // Find the bus by ID
    $bus = Bus::find($id);

    if (!$bus) {
        return redirect()->route('bus')->with('error', 'Bus not found!');
    }

    // Delete the bus
    $bus->delete();

    return redirect()->route('bus')->with('success', 'Bus deleted successfully!');
}

}
