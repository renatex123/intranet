<?php

namespace App\Providers;

use App\Nota;
use App\Periodo;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Event' => [
            'App\Listeners\EventListener',
        ],
    ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
/*
        Event::listen('eloquent.created: App\Ciclo', function($ciclo){
           
         //guardamos en variables el objeto ciclo que esta creando el usuario registrado 
           $user_id = $ciclo['user_id'];
           $carrera_id = $ciclo['carrera_id'];
           $curso_id = $ciclo['curso_id'];
           $nombre = $ciclo['nombre'];
           $id = $ciclo['id'];
           $nota1 = 0;
           $nota2 = 0;
           $nota3 = 0;
           $nota4 = 0;
           $nota5 = 0;
           $nota6 = 0;
           $nota7 = 0;
           $nota8 = 0;
           $estado_nota = 1;
           $estado_periodo = 1;
          //obtenemos la fecha actual y la guardamos en la variable now con el formato deseado
         $now = new \DateTime();
         $now->format('Y-m-d');
         //obtemenos los registros de periodos
         $periodos = periodo::all();  
         //recorres periodos y verificas la fecha para obtener el id del periodo      
         foreach ($periodos as $periodo) {
         if($periodo->fecha_inicio < $now->format('Y-m-d') and $periodo->fechafinal > $now->format('Y-m-d')){
          $periodo_id=$periodo->id;
         }
         //si no obtines el id en caso de error de fechas el id lo iguala a 0
         else
         {
          $periodo_id=0;
         }
      }
      // en caso de error de id del periodo le damos el mayor id del periodo registrado
         if($periodo_id==0)
         {
          $periodo2 =DB::table('periodos')->max('id'); 
          $periodo_id = $periodo2;
         }     
         //trigger del notas (a la hora de registrar el ciclo un usuario el trigger crea un registro de notas)
            nota::create(
            ['carrera_id' => $carrera_id,
            'curso_id' => $curso_id,
            'ciclo_id' => $id,
            'periodo_id' => $periodo_id,
            'user_id' => $user_id,
            'nota1' => $nota1,
            'nota2' => $nota2,
            'nota3' => $nota3,
            'nota4' => $nota4,
            'nota5' => $nota5,
            'nota6' => $nota6,
            'nota7' => $nota7,
            'nota8' => $nota8,
            'estado_nota' => $estado_nota,
            'estado_periodo' => $estado_periodo
        ]);

        });
        //*/
    }
}
