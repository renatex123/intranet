<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Carrera extends Model {

    protected $table = 'carreras';

    public function curso() {
        return $this->hasMany('App\curso');
    }

    public function cicloCarrera() {
        return $this->hasMany('App\ciclo');
    }
  
    protected $fillable = [
       'nombre',
    ];
}
