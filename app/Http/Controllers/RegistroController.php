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
    
    public function __construct()
    {
    $this->middleware('auth');
    }
   //Pestaña Periodos
    public function MostrarCarreras()
    {
         $carreras = Carrera::all();
        return view('registro.carreras', [
            'carreras' => $carreras
        ]);      
    }
       public function MostrarCursos(Request $request)
    {
          $request->validate([
         'carrera_id' => 'required|int',
       ]);
        $id_carrera = $request->input('carrera_id');
         $cursos = curso::all();
        return view('registro.curso', [
            'cursos' => $cursos, 'id_carrera' => $id_carrera
        ]);      
    }
      public function MostrarCiclos(Request $request)
    {
         $request->validate([
         'carrera_id' => 'required|int',
         'curso_id' => 'required|int',
       ]);

        $id_carrera = $request->input('carrera_id');
        $id_curso = $request->input('curso_id');
         $ciclos = ciclo::all();
        return view('registro.ciclos', [
            'ciclos' => $ciclos, 'id_carrera' => $id_carrera, 'id_curso' => $id_curso
        ]);      
    }
      public function MostrarAlumnos(Request $request)
    {
         $request->validate([
         'carrera_id' => 'required|int',
         'curso_id' => 'required|int',
         'ciclo_id' => 'required|int',
       ]);
        $id_carrera = $request->input('carrera_id');
        $id_curso = $request->input('curso_id');
        $id_ciclo = $request->input('ciclo_id');

         $fecha=date("Y-m-d");   
         $periodos = periodo::where('fecha_inicio', '<=', $fecha)->where('fecha_final', '>=', $fecha)->get(); 
         foreach ($periodos as $periodo ) {
             $id_periodo = $periodo->id;
         }
        $registros = registro::where('carrera_id', '=', $id_carrera)->where('curso_id', '=', $id_curso)->where('ciclo_id', '=', $id_ciclo)->where('periodo_id', '=', $id_periodo)->get();

             return view('registro.alumnos', [
             'registros' => $registros, 'id_carrera' => $id_carrera, 'id_curso' => $id_curso, 'id_ciclo' => $id_ciclo
        ]);      
    }
      public function Regresar($id)
    {
        
    }

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
  
         $id_carrera = $user->carrera_id;

         $registro = registro::where('carrera_id', '=', $id_carrera)->where('periodo_id','=',$periodo_id)->where('user_id', '=', $id)->get();
   
         if (count($registro) == 0) {
            return view('Registro.create',[
            'user' => $user,'periodos' => $periodos,'cursos' => $cursos,'ciclos' => $ciclos]);
           }
        elseif( $user->UserCarrera->nombre == "ADMINISTRACION" and count($registro)<2 ) {
             return view('Registro.create',[
            'user' => $user,'periodos' => $periodos,'cursos' => $cursos,'ciclos' => $ciclos]);
         }
         elseif ( $user->UserCarrera->nombre !== "ADMINISTRACION" and count($registro)<1 ) {
               return view('Registro.create',[
            'user' => $user,'periodos' => $periodos,'cursos' => $cursos,'ciclos' => $ciclos]);
         }
         else{
           return redirect()->route('Registros.index')->with(['message'=>'Ya Tienes agregado los registros permitidos por tu Carrera En un Periodo']);
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
    $verificacion = registro::where('carrera_id', '=', $request->input('carrera_id'))->where('periodo_id','=',$request->input('periodo_id'))->where('user_id', '=', $id)->where('ciclo_id', '=', $request->input('ciclo_id'))->get();
            if (count($verificacion) == 0) {
            $registros=registro::create([
            'carrera_id' => $request->input('carrera_id'),
            'curso_id' => $request->input('curso_id'),
            'ciclo_id' => $request->input('ciclo_id'),
            'periodo_id' => $request->input('periodo_id'),
            'user_id' => $id,
        ]);
            }
        if(!empty($registros))
        {
        return redirect()->route('Registros.index')->with(['message'=>'Registro agregado correctamente']);
        }else {
        return redirect()->route('Registros.index')->with(['message'=>'No Puedes Duplicar El registro']);
       }          

    }
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
