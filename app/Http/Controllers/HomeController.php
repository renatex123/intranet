<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Evento;
// use Notify;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function get_events(){

        $events = Evento::select("id","titulo as title","fecha_inicio as start", "fecha_final as end", "color")->get()->toArray();
        return response()->json($events);

    }

    public function create_events(Request $request){
        $input = $request->all();

        $input["fecha_inicio"] = $input["fecha_inicio"]." ".date("H:m:s", strtotime($input["hora_inicio"]));
        $input["fecha_final"] = $input["fecha_final"]." ".date("H:m:s", strtotime($input["hora_final"]));

        $input["color"] = "#000000";
        Evento::create($input);

        return back()->with(['message' => 'Se registro el evento']);
    }
    public function index() {
     
    }

  
}
