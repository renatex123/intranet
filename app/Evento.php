<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $table = "eventos";

    protected $fillable = [
    	'titulo','fecha_inicio','fecha_final','color'
    ];

    public $timestamps = false;
}
