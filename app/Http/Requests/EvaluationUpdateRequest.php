<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvaluationUpdateRequest extends Request
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
            'intervention_id'       => 'numeric|exists:interventions,id',
            'user_id'               => 'numeric|exists:users,id',
            'date'                  => 'date',
            'descripcion_evidencia' => 'string',
            'impacto'               => 'numeric|min:0|max:8',
            'estado_inicial'        => 'numeric|min:0|max:2',
            'estado_final'          => 'numeric|min:0|max:2',
            'description'           => 'string',
            'recomendaciones'       => 'string'
        ];
    }
}
