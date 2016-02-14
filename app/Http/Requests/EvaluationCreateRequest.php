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
            'intervention_id'       => 'required|numeric|exists:interventions,id',
            'user_id'               => 'required|numeric|exists:users,id',
            'descripcion_evidencia' => 'string',
            'impacto'               => 'required|numeric|min:1|max:8',
            'estado_inicial'        => 'required|numeric|min:1|max:3',
            'estado_final'          => 'required|numeric|min:1|max:3',
            'description'           => 'required|string',
            'recomendaciones'       => 'string'
        ];
    }
}
