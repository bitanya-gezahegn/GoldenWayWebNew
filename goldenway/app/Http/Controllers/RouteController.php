<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    public function create()
    {
        return view('routes.create');  // Make sure the 'routes.create' view exists
    }


    public function store(Request $request)
    {
        $request->validate([
            'start_point' => 'required|string|max:255',
            'end_point' => 'required|string|max:255',
            'duration' => 'required|integer',
            'distance' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        Route::create($request->all());

       
    return redirect()->back()->with('success', 'User registered successfully!');
}

public function index(Request $request)
{
    // Check if there's a search query
    $search = $request->get('search');


    // Fetch the routes with pagination and optional search filter
    $routes = Route::query()
        ->when($search, function ($query, $search) {
            return $query->where('start_point', 'like', "%$search%")
                         ->orWhere('end_point', 'like', "%$search%");
        })
        ->paginate(10); // Adjust pagination as needed

    return view('routes.index', compact('routes'));
}
public function book(){
return view('routes.book');
}

public function edit(Request $request, $id){
    return view('routes.edit');
}
}
