<?php

namespace proyectoPrueba;

use Illuminate\Database\Eloquent\Model;

class GasConsumo extends Model
{
	protected $table='gas_consumos';

	// Relación
    public function user() {
        return $this->belongsTo('proyectoPrueba\User');
    }
}
