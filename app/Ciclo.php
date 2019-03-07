<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model {

    protected $table = 'ciclos';

     protected $fillable = [
       'nombre',
    ];
/*
    protected $events=[

    'created'=> Event::class,    
    ];
*/
}
