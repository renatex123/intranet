<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
     protected $table = 'roles';

      protected $fillable = [
        'nombre',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    
}
