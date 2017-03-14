<?php

namespace proyectoPrueba\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaFormLineaMuestrasRequest extends FormRequest
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
            'linea'=>'required|in:a,A,b,B',
            'sequedadentrada'=>'numeric',
            'sequedadsalida'=>'numeric',
            'tt1'=>'numeric',
            'tt2'=>'numeric',
            'tt3'=>'numeric',
            'tt4'=>'numeric',
            'intensidadtambor'=>'numeric',
            'herziosbomba'=>'numeric',
            'vueltasbomba'=>'numeric',
            'nivelsilo'=>'numeric'
                 
        ];
    }
}
