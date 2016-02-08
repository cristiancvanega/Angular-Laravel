<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InterventionUpdateRequest extends Request
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
            'id'                            => 'numeric',
            'entity_id'                     => 'numeric',
            'municipality_id'               => 'numeric',
            'name'                          => 'string',
            'start_date'                    => 'date',
            'end_date'                      => 'date',
            'address'                       => 'string',
            'description'                   => 'string',
            'diversidad_dieta_inicio'       => 'numeric',
            'diversidad_dieta_fin'          => 'numeric',
            'variedad_dieta_inicio'         => 'numeric',
            'variedad_dieta_fin'            => 'numeric',
            'inseguridad_alimentaria_inicio'=> 'numeric',
            'inseguridad_alimentaria_fin'   => 'numeric'
        ];
    }
}
