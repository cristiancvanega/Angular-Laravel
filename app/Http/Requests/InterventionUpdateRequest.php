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
            'entity_id'                     => 'numeric|exists:entities,id',
            'municipality_id'               => 'numeric|exists:municipalities,id',
            'name'                          => 'string',
            'start_date'                    => 'date',
            'end_date'                      => 'date',
            'address'                       => 'string',
            'description'                   => 'string',
            'evidencias_planeadas'          => 'string',
        ];
    }
}
