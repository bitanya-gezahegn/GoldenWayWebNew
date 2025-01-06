<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Schedule;


use App\Models\IssueReport;
use App\Models\Rating;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function reportissues(){
        return view('driver.report');
    }public function reportissuecreate(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
    
        IssueReport::create([
            'driver_id' =>Auth::user()->id, // Example: Use the logged-in user ID
            'description' => $request->input('description'),
            'reported_at' => now(),
        ]);
    
        return view('driver.report')->with('success', 'Issue reported successfully.');
    }
    
    public function issuedisplay(){
        $reports=IssueReport::all();
        return view ('operations_officer.issuedisplay' , compact('reports'));
    }
    public function scheduleview()
    {
        // Assuming the authenticated driver is fetched using Auth facade
        $driverId = Auth::user()->id;
    
        // Fetch active schedules for the driver
        $schedules = Schedule::where('driver_id', $driverId)
                              ->where('status', 'active') // Filter by active status
                              ->with('trip')
                              ->get();
    
        // Return the view with schedules
        return view('driver.scheduleview', compact('schedules'));
    }
    public function history() {
        $driverId = Auth::user()->id;
    
        // Fetch active schedules for the driver
        $schedules = Schedule::where('driver_id', $driverId)
                              // Filter by active status
                              ->with('trip')
                              ->get();
    
        // Return the view with schedules
        return view('driver.history', compact('schedules'));
   
        
    }

    

}
