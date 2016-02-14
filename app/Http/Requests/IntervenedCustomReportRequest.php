<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IntervenedCustomReportRequest extends Request
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
            'name'          => 'string',
            'document'      => 'numeric',
            'document_type' => 'string',
            'address'       => 'address',
            'phone'         => 'numeric',
            'email'         => 'email',
            'pupilage'      => 'string'
        ];
    }
}
