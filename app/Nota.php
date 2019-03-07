<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model {

    protected $table = 'notas';

    public function notasRegistro() {
        return $this->belongsTo('App\registro', 'registro_id');
    }
    
      protected $fillable = [
       'registro_id','nota1','nota2','nota3','nota4','nota5','nota6','nota7','nota8','estado_nota','estado_periodo',
    ];

}
