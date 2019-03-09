<?php

namespace App\Providers;

use App\Registro;
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

        Event::listen('eloquent.created: App\Registro;', function($registro){
           
         //guardamos en variables el objeto ciclo que esta creando el usuario registrado 
           $registro_id = $registro['id'];
           var_dump($registro_id);
           die();
         //trigger del notas (a la hora de registrar el ciclo un usuario el trigger crea un registro de notas)
            nota::create(
            [
            'registro_id' => $registro_id,
            'nota1' => 0,
            'nota2' => 0,
            'nota3' => 0,
            'nota4' => 0,
            'nota5' => 0,
            'nota6' => 0,
            'nota7' => 0,
            'nota8' => 0,
            'estado_nota' => 1,
            'estado_periodo' => 1
        ]);

        });
       
    }
}
