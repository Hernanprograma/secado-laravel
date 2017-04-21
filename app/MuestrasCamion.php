<?php

namespace proyectoPrueba;

    use Illuminate\Database\Eloquent\Model;
  
class MuestrasCamion extends Model{

    protected $table = 'muestras_camion';
    // Relación
    public function user() {
        return $this->belongsTo('proyectoPrueba\User');
    }
}
