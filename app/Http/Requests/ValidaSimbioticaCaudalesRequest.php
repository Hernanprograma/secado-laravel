<?php

namespace proyectoPrueba\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidaSimbioticaCaudalesRequest extends FormRequest
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
       
        'caudal'=>'required|numeric|min:0',
        'hora'=>'required|required',
        'fecha'=>'required',
        'totalizado'=>'numeric|required'
        
        ];
    }
}
