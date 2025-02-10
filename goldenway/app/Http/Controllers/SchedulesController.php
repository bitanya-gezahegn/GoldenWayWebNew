<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Schedule;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class SchedulesController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['trip', 'driver'])->get();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        $trips = Trip::all();
        $bus = Bus::all();
        $drivers = User::where('role', 'driver')->get(); // Only users with the 'driver' role
        return view('schedules.create', compact('trips', 'drivers','bus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'driver_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:buses,id',

            'status' => 'required|string',
        ]);

        Schedule::create($request->all());
        return redirect()->route('schedules.index')->with('success', 'Schedule created successfully.');
    }

    public function edit(Schedule $schedule)
    {
        $trips = Trip::all();
        $bus = Bus::all();
        $drivers = User::where('role', 'driver')->get();
        return view('schedules.edit', compact('schedule', 'trips', 'drivers','bus'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'trip_id' => 'required|exists:trips,id',
            'driver_id' => 'required|exists:users,id',
            'bus_id' => 'required|exists:buses,id',

            'status' => 'required|string',
        ]);

        $schedule->update($request->all());
        return redirect()->route('schedules.index')->with('success', 'Schedule updated successfully.');
    }

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Schedule deleted successfully.');
    }
}
