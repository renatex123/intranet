<?php

namespace App\Http\Controllers;

use App\Silabus;
use App\Carrera;
use App\Ciclo;
use App\Curso;
use App\Periodo;
use Illuminate\Http\Request;
Use Illuminate\Support\Facades\File;
Use Illuminate\Support\Facades\Storage;
Use Illuminate\Http\Response;
Use Faker\Provider\Image;
use App\User;
use Auth;

class SilabusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   //mostrar paginas a usuarios registrados
     public function __construct()
    {
    $this->middleware('auth');
    }

    public function mostrar($id)
    {
        $silabus = silabus::where('ciclo_id','=',$id)
          ->get();
          foreach ($silabus as $silabu) {
         $doc=$silabu->archivo;
          }

        return view('silabus.mostrar',['doc' => $doc]);   
    }

    public function index()
    {
        $silabus = silabus::all();
        return view('silabus.index', [
            'silabus' => $silabus
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
        $ciclos = ciclo::all();
        $cursos = curso::all();
        $periodos = periodo::all();
        return view('silabus.create', ['carreras' => $carreras, 'ciclos' => $ciclos, 'cursos' => $cursos, 'periodos' => $periodos ]);
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
         'nombre' => 'required|string|max:50',
       ]);
        // Subir la imagen
        $archivo = $request-> file('archivo');

        if($archivo)
        {
        //Poner nombre unico
            $archivo_full = time().$archivo->getClientOriginalName();
        //Guardar la foto en la carpeta (storage/app/users)
            Storage::disk('silabus')->put($archivo_full, File::get($archivo));
        }
       $silabus=silabus::create([
            'carrera_id' => $request->input('carrera_id'),
            'curso_id' => $request->input('curso_id'),
            'ciclo_id' => $request->input('ciclo_id'),
            'periodo_id' => $request->input('periodo_id'),
            'nombre' => $request->input('nombre'),
            'archivo' => $archivo_full
        ]);

        if($silabus)
        {
        return redirect()->route('Silabus.index')->with(['message'=>'Silabus agregado correctamente']);
        }else {
        return redirect()->route('Silabus.index')->with(['message'=>'Ocurrio un problema al guardar el Silabus']);
       }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Silabus  $silabus
     * @return \Illuminate\Http\Response
     */
    public function show(Silabus $silabus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Silabus  $silabus
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $carreras = carrera::all();
        $ciclos = ciclo::all();
        $cursos = curso::all();
        $periodos = periodo::all();
        $silabus = silabus::find($id);
            return view('Silabus.edit',['silabus' => $silabus, 'carreras' => $carreras, 'ciclos' => $ciclos, 'cursos' => $cursos, 'periodos' => $periodos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Silabus  $silabus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Silabus $silabus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Silabus  $silabus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $silabus =silabus::find($id);
         if($silabus)
            {
            $silabus->delete();
            return redirect()-> route('Silabus.index')->with(['message'=>'Silabus eliminado correctamente']);
            }
            else{
            return redirect()-> route('Silabus.index')->with(['message'=>'Ocurrio un error al eliminar el Silabus']);
            }
    }
}
