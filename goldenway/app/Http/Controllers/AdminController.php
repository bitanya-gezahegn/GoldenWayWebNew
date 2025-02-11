<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;


use Illuminate\Support\Facades\Auth;
use App\Models\Route;
use App\Models\Ticket;
use App\Models\Trip;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{public function redirect(Request $request)
    {
        if (Auth::id()) {
            $actor = Auth::user();
            $usertype = Auth::user()->role;
            $status = Auth::user()->status;
    
            // Check if user is suspended
            if ($status === 'suspended') {
                Auth::logout(); // Log the user out immediately
                return redirect('/login')->with('error', 'Your account is suspended. Please contact support.');
            }
    
            if ($usertype == 'customer') {
                $schedules = Schedule::where('status', 'active')
                    ->latest()
                    ->take(10) // Limit to 10 schedules
                    ->get();
                return view('dashboard', compact('schedules'));
            } elseif ($usertype == 'admin') {
                $users = User::where('role', '!=', 'admin')->get();
                $total_ticket = Ticket::all()->count();
                $total_bus = Bus::all()->count();
                $total_user = User::all()->count();
                $total_trips = Trip::all()->count();
                return view('admin.dashboardadmin', compact('total_ticket', 'total_bus', 'total_user', 'total_trips', 'users'));
            } elseif ($usertype == 'driver') {
                return view('driver.dashboard');
            } elseif ($usertype == 'operations_officer') {
                $routes = Route::all();
                $total_ticket = Ticket::all()->count();
                $total_bus = Bus::all()->count();
                $total_user = User::all()->count();
                $total_trips = Trip::all()->count();
                return view('dashboardd', compact('routes', 'total_ticket', 'total_bus', 'total_user', 'total_trips'));
            } elseif ($usertype == 'ticket_officer') {
                $completedPayments = Payment::where('payment_status', 'completed')
                    ->with('customer')
                    ->get();
                return view('ticket_officer.dashboard', compact('completedPayments'));
            } else {
                return redirect()->back();
            }
        }
    }
    
    public function create(){
        return view('admin.users.create');
    }public function adminstoring(Request $request)
    {
        try {
            // Validate the request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'phone' => 'nullable|string|max:15',
                'password' => 'required|string|min:8|confirmed',
                'role' => 'required|in:operations_officer,driver,ticket_officer,customer,admin',
            ]);
    
            // Create the user
            User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
                'password' => Hash::make($validatedData['password']),
                'role' => $validatedData['role'],
                'status' => 'active',
            ]);
    
            // Redirect with a success message
            return redirect()->route('redirect')->with('success', 'User created successfully!');
    
        } catch (\Illuminate\Database\QueryException $ex) {
            // Handle database errors
            return back()->with('error', 'Database error: ' . $ex->getMessage());
        } catch (\Exception $ex) {
            // Handle other exceptions
            return back()->with('error', 'An error occurred: ' . $ex->getMessage());
        }
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
             'role' => 'required|string|in:customer,operations_officer,driver,ticket_officer',
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
     }
     // Handle the form submission and redirect to the result page
     public function processSearch(Request $request)
     {
         // Validate inputs
         $validatedData = $request->validate([
             'origin' => 'nullable|string|max:255',
             'destination' => 'nullable|string|max:255',
             'date' => 'nullable|date',
         ]);
     
         // Initialize query
         $query = Schedule::query();
     
         // Apply search filters
         if (!empty($validatedData['origin'])) {
             $query->whereHas('trip.route', function ($q) use ($validatedData) {
                 $q->where('origin', 'like', '%' . $validatedData['origin'] . '%');
             });
         }
     
         if (!empty($validatedData['destination'])) {
             $query->whereHas('trip.route', function ($q) use ($validatedData) {
                 $q->where('destination', 'like', '%' . $validatedData['destination'] . '%');
             });
         }
     
         if (!empty($validatedData['date'])) {
             $query->whereDate('created_at', $validatedData['date']);
         }
     
         // Retrieve filtered schedules
         $schedules = $query->with(['trip.route', 'driver'])->get();
     
         return view('dashboard', ['schedules' => $schedules]);
     }

// Show search results
public function showSearchResults()
{
    $schedules = session('schedules', []);
    return view('dashboard', ['schedules' => $schedules]);
}

     
       
     
  
    
    public function dashboardd(){
        $routes = Route::all();

        $total_ticket=Ticket::all()->count();
        $total_bus=Bus::all()->count();
        $total_user=User::all()->count();
        $total_trips=Trip::all()->count();
                
                return view('dashboardd',compact('routes','total_ticket','total_bus','total_user','total_trips'));
          
    }
    public function dashboard(){
        return redirect()->route('redirect');
    }
    public function manageroute(){
        $routes = Route::all();
        return view('routes.routes',compact('routes'));
    }
    public function dashboardadmin(){
        
        $users = User::where('role', '!=', 'admin')->get();
        $total_ticket=Ticket::all()->count();
        $total_bus=Bus::all()->count();
        $total_user=User::all()->count();
        $total_trips=Trip::all()->count();
return view('admin.dashboardadmin',compact('total_ticket','total_bus','total_user','total_trips','users'));
            
    }

public function manageusers (){
    $users = User::where('role', '!=', 'admin')->get();
    $total_ticket=Ticket::all()->count();
    $total_bus=Bus::all()->count();
    $total_user=User::all()->count();
    $total_trips=Trip::all()->count();
return view('admin.users.index',compact('total_ticket','total_bus','total_user','total_trips','users'));
 
}}