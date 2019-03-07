<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model {

    protected $table = 'asistencias';
     protected $fillable = [
       'registro_id', 'estado',
    ];

}
