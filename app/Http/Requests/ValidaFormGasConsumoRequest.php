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
            
            'receptora_lectura'=>'required',
            'receptora_vb'=>'required',
            'receptora_vm'=>'required',
            'caldera'=>'required',
            'caldera_vbt'=>'required',
            'caldera_vmt'=>'required',
            'coogeneracion_lectura'=>'required',
            'coogeneracion_vbt'=>'required',
            'coogeneracion_vmt'=>'required'
            ];
    }
}
