<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model {

    protected $table = 'documentos';

      public function CarreraDocumento() {
        return $this->belongsTo('App\carrera', 'carrera_id');
    }
     public function CursoDocumento() {
        return $this->belongsTo('App\curso', 'curso_id');
    }
     public function CicloDocumento() {
        return $this->belongsTo('App\ciclo', 'ciclo_id');
    }
     protected $fillable = [
       'carrera_id','curso_id','ciclo_id','nombre','archivo',
    ];

}
