<?php

namespace App\Http\Controllers;

use App\Ciclo;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Carrera;
use App\Curso;
use App\Nota;
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
          $id = \Auth::user()->id;
          $ciclos =DB::table('ciclos')
          ->join('users','ciclos.user_id','=','users.id')
          ->join('carreras','ciclos.carrera_id','=','carreras.id')
          ->join('cursos','ciclos.curso_id','=','cursos.id')
          ->select('ciclos.nombre as ciclonombre','ciclos.id as id','carreras.nombre as carreranombre','cursos.nombre as cursonombre')
          ->where('ciclos.user_id','=',$id)
          ->get();
       
   
        return view('ciclos.index', ['ciclos' => $ciclos]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carreras = carrera::all();
        $cursos = curso::all();
        return view('ciclos.create', [
            'carreras' => $carreras, 'cursos' => $cursos
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
            'user_id' => 'required|int',
          'curso_id' => 'required|int',
         'nombre' => 'required|string|max:20',
       ]);
        $cursos=curso::find($request->input('curso_id'));  

        $carrera_id=$cursos->carrera_id;

        $user_id = $request->input('user_id');
        $curso_id = $request->input('curso_id');
        $nombre = $request->input('nombre');

       $ciclos=ciclo::create(['user_id' => $user_id,
            'carrera_id' => $carrera_id,
            'curso_id' => $curso_id,
            'nombre' => $nombre   
        ]);

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
