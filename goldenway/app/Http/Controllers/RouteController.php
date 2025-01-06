<?php



namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
  
    public function index()
    {
        $routes = Route::all();
        return view('routes.routes', compact('routes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start' => 'required|string',
            'end' => 'required|string',
            'stop' => 'string',
        ]);

        Route::create([
            'origin' => $request['start'],
            'destination' => $request['end'],
            'bus_stops'=>  json_encode([$request['stop']]),

        
        ]);
            $routes=Route::all(); 
            return redirect()->route('routes.index')->with('success', 'Route added successfully!');
        }
        public function edit($id){

  $routes=Route::find($id);
    
    
           return view('routes.edit',compact('routes'));
        }


        public function edit_confirm(Request $request, $id){
            $routes=Route::find($id);
             $routes->origin=$request->start;
            $routes->destination=$request->end;
           
            $routes->save();
            
            
            return redirect()->route('routes.index')->with('success','Product Updated SuccessFully');
            
                }



    public function destroy($id)
    {
        Route::destroy($id);
        return redirect()->route('routes.index')->with('success', 'Route deleted successfully!');
    }
}
