<?php

namespace proyectoPrueba;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'name', 'email', 'password', 'last_name'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    'password', 'remember_token',
    ];

    public function scopeUsuario($query) {
        return $query->where('id', '1')->first();
    }

    // Relacion
    public function gasconsumo()
    {
        return $this->hasMany('proyectoPrueba\Gasconsumo');
    }
    // Relación
    public function simbiotica()
    {
        return $this->hasMany('proyectoPrueba\SimbioticaCaudales');
    }
    // Relación
    public function lineamuestra()
    {
        return $this->hasMany('proyectoPrueba\LineaMuestra');
    }
     public function muestracamion()
    {
        return $this->hasMany('proyectoPrueba\MuestrasCamion');
    }

}
