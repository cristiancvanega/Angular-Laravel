<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IntervenedUpdateRequest extends Request
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
            'document_type' => 'string|min:0|max:3',
            'document'      => 'numeric',
            'address'       => 'string',
            'phone'         => 'numeric',
            'email'         => 'email|unique:users,email',
            'pupilage'      => 'string'
        ];
    }
}
