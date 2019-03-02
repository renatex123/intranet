<?php

namespace App\Http\Controllers;

use App\Periodo;
use Illuminate\Http\Request;

class PeriodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
    $this->middleware('auth');
    }
    public function mostrarperiodos()
    {
    
         $periodos = periodo::all();
        return view('periodos.mostrarperiodo', [
            'periodos' => $periodos
        ]);      
    }

    public function index()
    {
          $periodos = periodo::all();
        return view('periodos.index', [
            'periodos' => $periodos
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periodos.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'nombre' => 'required|string|max:30',
        'fecha_inicio' => 'required|date',
        'fechafinal' => 'required|date',

       ]);

      periodo::create($request->all());
       $periodos = periodo::all();
        return view('periodos.index', ['periodos' => $periodos]);    
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function show(Periodo $periodo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
      public function edit($id)
    {
         $periodo = periodo::find($id);
            return view('Periodos.edit',[
                'periodo' => $periodo
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
         $request->validate([
        'nombre' => 'required|string|max:30',
        'fecha_inicio' => 'required|date',
        'fechafinal' => 'required|date',

       ]);
        $nombre = $request->input('nombre');
        $fecha_inicio = $request->input('fecha_inicio');
        $fechafinal = $request->input('fechafinal');

        $periodo =periodo::find($id);
        $periodo->nombre = $nombre;
        $periodo->fecha_inicio = $fecha_inicio;
        $periodo->fechafinal = $fechafinal;
        $update=$periodo->update();

        if($update)
        {
        return redirect()->route('Periodos.index')->with(['message'=>'Periodo Actualizado correctamente']);
        }else {
        return redirect()->route('Periodos.index')->with(['message'=>'Ocurrio un problema al Actualizar el Periodo']);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Periodo  $periodo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $periodo =periodo::find($id);
         if($periodo)
            {
            $periodo->delete();
            return redirect()-> route('Periodos.index')->with(['message'=>'Periodo eliminado correctamente']);
            }
            else{
            return redirect()-> route('Periodos.index')->with(['message'=>'Ocurrio un error al eliminar el Perido']);
            }
    }
}
