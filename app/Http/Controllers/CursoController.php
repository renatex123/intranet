<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Carrera;
use Illuminate\Http\Request;

class CursoController extends Controller
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

     public function mostrarcurso()
    {
    
         $cursos = curso::all();
        return view('cursos.mostrarcurso', [
            'cursos' => $cursos
        ]);      
    }

    public function index()
    {
        $cursos = curso::all();
        return view('cursos.index', [
            'cursos' => $cursos
        ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $carreras = carrera::all();
        return view('cursos.create', [
            'carreras' => $carreras
        ]);
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
         'carrera_id' => 'required|int',
         'nombre' => 'required|string|max:50',
         'descripcion' => 'required|string|max:255',

       ]);

       $cursos=curso::create($request->all());

        if($cursos)
        {
        return redirect()->route('Cursos.index')->with(['message'=>'Curso agregado correctamente']);
        }else {
        return redirect()->route('Cursos.index')->with(['message'=>'Ocurrio un problema al guardar el Curso']);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carreras = carrera::all();
        $cursos = curso::find($id);
            return view('Cursos.edit',['cursos' => $cursos, 'carreras' => $carreras ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
          $request->validate([
          'carrera_id' => 'required|int',
         'nombre' => 'required|string|max:50',
         'descripcion' => 'required|string|max:255',

       ]);
        $carrera_id = $request->input('carrera_id');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');

          $curso =curso::find($id);
        $curso->carrera_id = $carrera_id;
        $curso->nombre = $nombre;
        $curso->descripcion = $descripcion;
        $update=$curso->update();

        if($update)
        {
        return redirect()->route('Cursos.index')->with(['message'=>'Curso Actualizado correctamente']);
        }else {
        return redirect()->route('Cursos.index')->with(['message'=>'Ocurrio un problema al Actualizar el curso']);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $cursos =curso::find($id);
         if($cursos)
            {
            $cursos->delete();
            return redirect()-> route('Cursos.index')->with(['message'=>'Curso eliminado correctamente']);
            }
            else{
            return redirect()-> route('Cursos.index')->with(['message'=>'Ocurrio un error al eliminar el Curso']);
            }
    }
}
