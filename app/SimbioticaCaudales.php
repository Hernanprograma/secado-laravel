<?php

namespace proyectoPrueba;

use Illuminate\Database\Eloquent\Model;

class SimbioticaCaudales extends Model
{
    protected $table = 'simbiotica_caudales';

    protected $dates = ['hora'];

// Relación
    public function user()
    {
        return $this->belongsTo('proyectoPrueba\User');
    }
}

