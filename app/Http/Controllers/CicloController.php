<?php

namespace App\Http\Controllers;

use App\Ciclo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CicloController extends Controller
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
    public function index()
    {
           $ciclos = ciclo::all();
        return view('ciclos.index', [
            'ciclos' => $ciclos
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ciclos.create');
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
         'nombre' => 'required|string|max:20|unique:ciclos,nombre',
       ]);
        $ciclos=ciclo::create($request->all());

        if($ciclos)
        {
        return redirect()->route('Ciclos.index')->with(['message'=>'Ciclo agregado correctamente']);
        }else {
        return redirect()->route('Ciclos.index')->with(['message'=>'Ocurrio un problema al guardar el Ciclo']);
       }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function show(Ciclo $ciclo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function edit(Ciclo $ciclo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ciclo $ciclo)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ciclo  $ciclo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ciclo =ciclo::find($id);
         if($ciclo)
            {
            $ciclo->delete();
            return redirect()-> route('Ciclos.index')->with(['message'=>'Ciclo eliminado correctamente']);
            }
            else
            {
            return redirect()-> route('Ciclos.index')->with(['message'=>'Ocurrio un error al eliminar el Ciclo']);
            }
    }
    

   
}
