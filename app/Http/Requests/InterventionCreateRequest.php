<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InterventionCreateRequest extends Request
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
            'entity_id'                     => 'required|numeric',
            'municipality_id'               => 'required|numeric',
            'name'                          => 'required|string',
            'start_date'                    => 'required|date',
            'end_date'                      => 'date',
            'address'                       => 'required|string',
            'description'                   => 'required|string',
            'diversidad_dieta_inicio'       => 'required|numeric',
            'diversidad_dieta_fin'          => 'numeric',
            'variedad_dieta_inicio'         => 'required|numeric',
            'variedad_dieta_fin'            => 'numeric',
            'inseguridad_alimentaria_inicio'=> 'required|numeric',
            'inseguridad_alimentaria_fin'   =>'numeric'
        ];
    }
}
