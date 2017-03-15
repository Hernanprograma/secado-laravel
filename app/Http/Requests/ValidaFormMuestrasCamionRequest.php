<?php

namespace proyectoPrueba\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaFormMuestrasCamionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'centrifuga'=>'required|in:a,A,b,B,c,C',
        'entrada' => 'numeric',
        'salida'=>'numeric',
        'consigna'=>'numeric',
        'va'=>'numeric',
        'vr'=>'numeric',
        'par'=>'numeric',
        't_entrada'=>'numeric',
        't_salida'=>'numeric',
        'vibracion'=>'numeric',
        'caudal_ent'=>'numeric',
        'marcapoli'=>'numeric',
        'caudal_poli'=>'numeric'
        ];
    }
}
