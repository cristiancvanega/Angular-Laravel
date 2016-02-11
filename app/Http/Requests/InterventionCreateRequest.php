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
            'entity_id'                     => 'required|numeric|exists:entities,id',
            'municipality_id'               => 'required|numeric|exists:municipalities,id',
            'name'                          => 'required|string',
            'start_date'                    => 'required|date',
            'end_date'                      => 'date',
            'address'                       => 'required|string',
            'description'                   => 'required|string',
            'diversidad_dieta_inicio'       => 'required|numeric|min:0|max:2',
            'diversidad_dieta_fin'          => 'numeric|min:0|max:2',
            'variedad_dieta_inicio'         => 'required|numeric|min:0|max:2',
            'variedad_dieta_fin'            => 'numeric|min:0|max:2',
            'inseguridad_alimentaria_inicio'=> 'required|numeric|min:0|max:3',
            'inseguridad_alimentaria_fin'   =>'numeric|min:0|max:3'
        ];
    }
}
