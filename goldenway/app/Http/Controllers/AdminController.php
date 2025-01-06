<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use App\Models\Route;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function redirect(Request $request){
        if(Auth::id()){
            $actor=Auth::user();
      $usertype= Auth::user()->role;

      if($usertype == 'customer') {
        $schedules = Schedule::where('status', 'active')->get();
        return view('dashboard', compact('schedules'));
    }
            elseif($usertype == 'admin'){

                $users = User::where('role', '!=', 'admin')->get();
                return view('admin.users.index', compact('users'));
            }
            elseif($usertype == 'driver'){
                return view('driver.dashboard',compact('actor'));

            }
            elseif($usertype == 'operations_officer'){
        $routes = Route::all();
                
                return view('dashboardd',compact('routes'));
                
        }
        elseif($usertype == 'ticket_officer'){
            $completedPayments = \App\Models\Payment::where('payment_status', 'completed')
            ->with('customer') // Eager load the related customer
            ->get();
    
        return view('ticket_officer.dashboard', compact('completedPayments'));
    
            
    }
    else {
        return redirect()->back();
    }
}
    }
    public function create(){
        return view('admin.users.create');
    }
    public function adminstoring(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable|string|max:15', // 'nullable' allows optional input for phone
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:operations_officer,driver,ticket_officer,customer,admin', // Match all enum options
        ]);
    
        // Create the user
        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'], // Allows null value
            'password' => Hash::make($validatedData['password']),
            'role' => $validatedData['role'], // Use 'role' to match table column
            'status' => 'active', // Default status
        ]);
    
        // Redirect with a success message or view
        return redirect()->route('redirect')->with('success', 'User created successfully!');
    }
    
     public function home(){
        return view ('home');
     }
     public function admincreate(){
        return view('admin.users.create');
     }
     public function getindex(){
        return view('admin.users.index');
     }
     public function adminediting($id)
     {
         $user = User::findOrFail($id);
         return view('admin.users.edit', compact('user'));
     }
     public function adminupdating(Request $request, $id)
     {
         // Validate input, including the 'status' field
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $id,
             'phone' => 'required|string|max:15',
             'role' => 'required|string|in:operations_officer,driver,ticket_officer',
             'status' => 'required|string|in:active,suspended', // Added validation for status
         ]);
     
         // Find the user
         $user = User::findOrFail($id);
     
         // Update user details
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->phone = $request->input('phone');
         $user->role = $request->input('role');
         $user->status = $request->input('status'); // Update the 'status' field
     
         // Save changes
         $user->save();
     
         // Redirect with success message
         return redirect()->route('redirect')->with('success', 'User updated successfully.');
     }
     

     
 
     // Delete user
     public function admindestroying($id)
     {
         $user = User::findOrFail($id);
         $user->delete();
 
         return redirect()->route('users.index')->with('success', 'User deleted successfully!');
     }public function search(Request $request)
     {
         // Validate inputs
         $request->validate([
             'origin' => 'nullable|string|max:255',
             'destination' => 'nullable|string|max:255',
             'date' => 'nullable|date',
         ]);
     
         // Initialize query
         $query = Schedule::query();
     
         // Filter by origin
         if ($request->filled('origin')) {
             $query->whereHas('trip.route', function ($q) use ($request) {
                 $q->where('origin', 'like', '%' . $request->input('origin') . '%');
             });
         }
     
         // Filter by destination
         if ($request->filled('destination')) {
             $query->whereHas('trip.route', function ($q) use ($request) {
                 $q->where('destination', 'like', '%' . $request->input('destination') . '%');
             });
         }
     
         // Filter by date
         if ($request->filled('date')) {
             $query->whereDate('created_at', $request->input('date'));
         }
     
         // Retrieve results
         $schedules = $query->with(['trip.route', 'driver'])->get();
     
         return view('dashboard', ['schedules' => $schedules]);
     }
     
       
     
    public function test(){
        return view('test');
    }   public function dashboardd(){
        return view('dashboardd');
    }
    public function manageroute(){
        $routes = Route::all();
        return view('routes.routes',compact('routes'));
    }
    public function dashboardadmin(){
        return view('admin.dashboardadmin');
    }
}

