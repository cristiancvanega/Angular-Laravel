<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvaluationCreateRequest extends Request
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
            'intervention_id'       => 'required|numeric',
            'user_id'               => 'required|numeric',
            'date'                  => 'required|date',
            'descripcion_evidencia' => 'string',
            'impacto'               => 'required|numeric',
            'estado_inicial'        => 'numeric',
            'estado_final'          => 'numeric',
            'description'           => 'required|string',
            'recomendaciones'       => 'string'
        ];
    }
}
