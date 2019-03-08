<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $table = 'registros';

      public function CarreraRegistro() {
        return $this->belongsTo('App\carrera', 'carrera_id');
    }
     public function CursoRegistro() {
        return $this->belongsTo('App\curso', 'curso_id');
    }
     public function CicloRegistro() {
        return $this->belongsTo('App\ciclo', 'ciclo_id');
    }
     public function PeriodoRegistro() {
        return $this->belongsTo('App\periodo', 'periodo_id');
    }
    public function UserRegistro() {
        return $this->belongsTo('App\user', 'user_id');
    }
     protected $fillable = [
       'carrera_id','curso_id','ciclo_id','periodo_id','user_id',
    ];
     protected $events=[

    'created'=> Event::class,    
    ];
}
