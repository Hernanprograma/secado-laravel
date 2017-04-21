<?php

namespace proyectoPrueba;

use Illuminate\Database\Eloquent\Model;

class LineaMuestra extends Model {

    protected $table = 'linea_muestras';
    // Relación
    public function user() {
        return $this->belongsTo('proyectoPrueba\User');
    }


}
