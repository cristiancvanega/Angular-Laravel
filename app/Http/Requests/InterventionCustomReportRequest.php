<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class InterventionCustomReportRequest extends Request
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
            'entity_id' => 'numeric',
            'municipality_id' => 'numeric',
            'name'=> 'string',
            'start_date' => 'date',
            'end_date' => 'date',
            'description' => 'string',
            'description' => 'string'
        ];
    }
}
