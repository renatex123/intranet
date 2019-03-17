<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function UserRol() {
        return $this->belongsTo('App\Role', 'rol_id');
    }

     public function UserCarrera() {
         return $this->belongsTo('App\Carrera', 'carrera_id');
     }
    protected $fillable = [
        'name', 'surname', 'email', 'nick', 'dni', 'password', 'clave_carrera','foto','rol_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
/*
    public function ciclo() {
        return $this->hasMany('App\ciclo');
    }
*/
}
