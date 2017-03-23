<?php

namespace proyectoPrueba;

use Illuminate\Database\Eloquent\Model;

class GasConsumo extends Model
{
	protected $table='gas_consumos';

	// Relación
    public function user() {
        return $this->hasOne('proyectoPrueba\User', 'id'); // Le indicamos que se va relacionar con el atributo id
    }
}
