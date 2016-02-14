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
            //'start_date'                    => 'required|date',
            'intervened_id'                 => 'required|numeric|exists:users,id',
            'end_date'                      => 'date',
            'description'                   => 'required|string',
            'evidencias_planeadas'          => 'required|string',
        ];
    }
}
