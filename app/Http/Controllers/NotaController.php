<?php

namespace App\Http\Controllers;
use App\Nota;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Curso;
use App\Ciclo;
use App\Periodo;
use Illuminate\Support\Facades\DB;
class NotaController extends Controller
{
   
    public function __construct()
    {
    $this->middleware('auth');
    }
    //ver alumnos de acuerdo a su peridos
     public function alumnosperiodos($id,$id2)
    {

        $alumnos =nota::where('periodo_id','=',$id)->where('carrera_id','=',$id2)->get();
        return view('notas.alumnosperiodos', ['alumnos' => $alumnos ]);
    }
     public function veralumnoadmin($id)
    {
        //mostrar las notas de los periodos mayores
        $periodo2 =DB::table('periodos')->max('id'); 
        $periodo_id = $periodo2;
        $notas = nota::where('carrera_id', '=', $id,'and','periodo_id','=', $periodo_id)->get();
        return view('ciclos.mostrarestudiantes', [
             'notas' => $notas 
        ]);
    }
      //mostrar notas de acuerdo a su ciclo a id para las vistas del admin
         public function notasidadmin($id)
    {   
            $notas = nota::where('ciclo_id','=',$id)->get();
         return view('notas.alumnoadmin', ['notas' => $notas]);
    }

     //funcion del admin para mostrar las notas de alumno y tambien con 2 variables que contiene las notas promediadad
      public function notasid($id)
    {   
            $notas = nota::where('ciclo_id','=',$id)->get();
        foreach ($notas as $nota ) {
            $promedio1=($nota->nota1+$nota->nota2+$nota->nota3+$nota->nota4)/4;
            $promedio2=($nota->nota5+$nota->nota6+$nota->nota7+$nota->nota8)/4;
        }
        return view('notas.nota-alumno', ['notas' => $notas])->with('promedio1', $promedio1)->with('promedio2', $promedio2);
    }
    //funcion para editar las notas de los alumnos
    public function editarnotas(Request $request)
    {   
         $validate = $this->validate($request,[ 
        'id' => 'required|int',
        'nota1' => 'required|string|max:4',
        'nota2' => 'required|string|max:4',
        'nota3' => 'required|string|max:4',
        'nota4' => 'required|string|max:4',
        'nota5' => 'required|string|max:4',
        'nota6' => 'required|string|max:4',
        'nota7' => 'required|string|max:4',
        'nota8' => 'required|string|max:4',
       ]);
        
        $id = $request->input('id');
        $nota1 = $request->input('nota1');
        $nota2 = $request->input('nota2');
        $nota3 = $request->input('nota3');
        $nota4 = $request->input('nota4');
        $nota5 = $request->input('nota5');
        $nota6 = $request->input('nota6');
        $nota7 = $request->input('nota7');
        $nota8 = $request->input('nota8');

        $notas =nota::find($id);
        $notas->nota1 = $nota1;
        $notas->nota2 = $nota2;
        $notas->nota3 = $nota3;
        $notas->nota4 = $nota4;
        $notas->nota5 = $nota5;
        $notas->nota6 = $nota6;
        $notas->nota7 = $nota7;
        $notas->nota8 = $nota8;
        $update=$notas->update();

        $notas = nota::where('id','=',$id)->get();
         foreach ($notas as $nota ) {
            $promedio1=($nota->nota1+$nota->nota2+$nota->nota3+$nota->nota4)/4;
            $promedio2=($nota->nota5+$nota->nota6+$nota->nota7+$nota->nota8)/4;
        }
        if($update)
        {
        return view('notas.nota-alumno', ['notas' => $notas])->with(['message'=>'Actualizado correctamente'])
        ->with('promedio1', $promedio1)->with('promedio2', $promedio2);
        }else {
        return view('notas.nota-alumno', ['notas' => $notas])->with(['message'=>'Ocurrio un problema al Actualizar '])
        ->with('promedio1', $promedio1)->with('promedio2', $promedio2);
        }
    }
     public function periodocarrera()
    {
         $notas = nota::all();
         return view('notas.editar', ['notas' => $notas]);
    }
    public function index($id)
    {
          $notas =nota::where('ciclo_id','=',$id)->get();
        return view('notas.index', ['notas' => $notas]);
    }
    //edita las notas con el rol de admin
     
}
