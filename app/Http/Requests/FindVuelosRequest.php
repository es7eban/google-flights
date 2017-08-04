<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindVuelosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        #return false;
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
            'origen'=>'required',
            'destino'=>'required',
            'fec_ini'=>'required',
            #'fec_fin'=>'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'origen.required' => 'Debe ingresar un aeropuerdo de origen',
            'destino.required' => 'Debe ingresar un aeropuerdo de destino',
            'fec_ini.required' => 'Debe indicar una "fecha inicio"',
            'fec_fin.required' => 'Debe indicar una "fecha final" para la busqueda'
        ];
    }
}
