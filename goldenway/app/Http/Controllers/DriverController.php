<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

use App\Models\IssueReport;
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

}
