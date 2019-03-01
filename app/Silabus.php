<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Silabus extends Model {

    protected $table = 'silabus';

     public function CarreraSilabus() {
        return $this->belongsTo('App\carrera', 'carrera_id');
    }
     public function CursoSilabus() {
        return $this->belongsTo('App\curso', 'curso_id');
    }
     public function CicloSilabus() {
        return $this->belongsTo('App\ciclo', 'ciclo_id');
    }
     public function PeriodoSilabus() {
        return $this->belongsTo('App\periodo', 'periodo_id');
    }
     protected $fillable = [
       'carrera_id','curso_id','ciclo_id','periodo_id','nombre','archivo',
    ];

}
