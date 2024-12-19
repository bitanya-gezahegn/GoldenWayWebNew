<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use App\Models\Route;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request){
        if(Auth::id()){
            $actor=Auth::user();
      $usertype= Auth::user()->usertype;

            if($usertype == 'customer'){
    $search = $request->get('search');

                $routes = Route::query()
                ->when($search, function ($query, $search) {
                    return $query->where('start_point', 'like', "%$search%")
                                 ->orWhere('end_point', 'like', "%$search%");
                })
                ->paginate(10); // Adjust pagination as needed
        
            return view('routes.index', compact('routes'));
        
           }
            elseif($usertype == 'admin'){

    $search = $request->get('search');
    $user=User::all();

    $routes = Route::query()
    ->when($search, function ($query, $search) {
        return $query->where('start_point', 'like', "%$search%")
                     ->orWhere('end_point', 'like', "%$search%");
    })
    ->paginate(10); // Adjust pagination as needed
                return view('admin.dashboard', compact('routes' , 'user'));
            }
            elseif($usertype == 'driver'){
                return view('driver.dashboard',compact('actor'));

            }
            elseif($usertype == 'registor_officer'){
                return view('registor_officer.dashboard',compact('actor'));
                
        }
        elseif($usertype == 'ticket_officer'){
            return view('ticket_officer.dashboard',compact('actor' ));
            
    }
    else {
        return redirect()->back();
    }
}
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone' => 'required|string|max:15',
        'password' => 'required|min:8',
        'usertype' => 'required|in:registor_officer,driver,ticket_officer',
    ]);

    // Create the user
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'password' => Hash::make($validated['password']),
        'usertype' => $validated['usertype'],
    ]);

   
    return redirect()->back()->with('success', 'User registered successfully!');

}



}

