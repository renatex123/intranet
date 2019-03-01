<?php

namespace App\Http\Controllers;

use App\Carrera;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class CarreraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function __construc()
     {
        $this->middleware('auth');
     }   
    public function index()
    {
             $carreras = carrera::all();
        return view('carreras.index', [
            'carreras' => $carreras
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carreras.create');
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

       ]);

       $create=carrera::create($request->all());

        if($create)
        {
        return redirect()->route('Carreras.index')->with(['message'=>'Carrera agregado correctamente']);
        }else {
        return redirect()->route('Carreras.index')->with(['message'=>'Ocurrio un problema al guardar la carrera']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $carrera = carrera::find($id);
            return view('carreras.edit',[
                'carrera' => $carrera
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     
        $request->validate([
        'nombre' => 'required|string|max:30',

       ]);
         $nombre = $request->input('nombre');
          $Carrera =Carrera::find($id);
        $Carrera->nombre = $nombre;
        $update=$Carrera->update();

        if($update)
        {
        return redirect()->route('Carreras.index')->with(['message'=>'Carrera Actualizado correctamente']);
        }else {
        return redirect()->route('Carreras.index')->with(['message'=>'Ocurrio un problema al Actualizar la carrera']);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carrera  $carrera
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Carrera =Carrera::find($id);
         if($Carrera)
            {
            $Carrera->delete();
            return redirect()-> route('Carreras.index')->with(['message'=>'Carrera eliminado correctamente']);
            }
            else{
            return redirect()-> route('Carreras.index')->with(['message'=>'Ocurrio un error al eliminar la carrera']);
            }
    }

     public function vercarreraadmin()
    {

        $carreras = carrera::all();
        return view('ciclos.mostrarcarreras', [
             'carreras' => $carreras 
        ]);
    }
}
