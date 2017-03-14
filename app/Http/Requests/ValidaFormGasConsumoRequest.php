<?php

namespace proyectoPrueba\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaFormGasConsumoRequest extends FormRequest
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
            
            'receptora_lectura'=>'required | numeric',
            'receptora_vb'=>'required | numeric',
            'receptora_vm'=>'required | numeric',
            'caldera'=>'required | numeric',
            'caldera_vbt'=>'required | numeric',
            'caldera_vmt'=>'required | numeric',
            'coogeneracion_lectura'=>'required | numeric',
            'coogeneracion_vbt'=>'required | numeric',
            'coogeneracion_vmt'=>'required | numeric'
            ];
    }
}
