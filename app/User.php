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

    // Relación
        public function gasConsumos()
        {
            return $this->hasMany('proyectoPrueba\Gasconsumo');
        }

}
