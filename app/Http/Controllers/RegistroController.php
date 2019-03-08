<?php

namespace App\Http\Controllers;
use App\Carrera;
use App\Ciclo;
use App\Curso;
use App\Periodo;
use App\User;
use App\Registro;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = \Auth::user()->id;
       $registros = registro::where('user_id','=',$id)->get();
        return view('Registro.index', [
            'registros' => $registros
        ]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $id = \Auth::user()->id;
         $user = user::find($id);
         $fecha=date("Y-m-d");   
         $periodos = periodo::where('fecha_inicio', '<=', $fecha)->where('fecha_final', '>=', $fecha)->get(); 
         foreach ($periodos as $periodo) 
         {
            $periodo_id=$periodo->id;
         }
         $cursos = curso::all();
         $ciclos = ciclo::all();
         $carreras = carrera::where('clave_carrera', '=', $user->clave_carrera)->get();
         foreach ($carreras as $carrera) {
             $carrera_nombre=$carrera->nombre; 
             $carrera_id=$carrera->id;
         }
         if ($carrera_nombre=="ADMINISTRACION") $id_admin=$carrera_id;
         else $id_dife=$carrera_id;

         if(empty($id_admin))
         {
        $registrodif = registro::where('carrera_id', '=', $id_dife)->where('periodo_id','=',$periodo_id)->where('user_id', '=', $id)->get();
        if(count($registrodif)<1)
        {
            return view('Registro.create',[
            'carreras' => $carreras,'periodos' => $periodos,'cursos' => $cursos,'ciclos' => $ciclos,
        ]);

        }
        else
        {
          $registros = registro::where('user_id','=',$id)->get();
        return view('Registro.index', [
            'registros' => $registros
        ]);       
        }      
     
        }
        else
        {
        $registroadmin = registro::where('carrera_id', '=', $id_admin)->where('periodo_id', '=', $periodo_id)
          ->where('user_id', '=', $id)->get(); 
        if (count($registroadmin)<2) {
            return view('Registro.create',[
            'carreras' => $carreras,'periodos' => $periodos,'cursos' => $cursos,'ciclos' => $ciclos,
        ]);

        }
        else
        {
              $registros = registro::where('user_id','=',$id)->get();
        return view('Registro.index', [
            'registros' => $registros
        ]);       
        }
    }
    
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
         'curso_id' => 'required|int',
         'ciclo_id' => 'required|int',
         'periodo_id' => 'required|int',
         
       ]);
            $id = \Auth::user()->id;
            $registros=registro::create([
            'carrera_id' => $request->input('carrera_id'),
            'curso_id' => $request->input('curso_id'),
            'ciclo_id' => $request->input('ciclo_id'),
            'periodo_id' => $request->input('periodo_id'),
            'user_id' => $id,
        ]);

        if($registros)
        {
        return redirect()->route('Registros.index')->with(['message'=>'Registro agregado correctamente']);
        }else {
        return redirect()->route('Registros.index')->with(['message'=>'Ocurrio un problema al guardar el Registro']);
       }   
        
           

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
