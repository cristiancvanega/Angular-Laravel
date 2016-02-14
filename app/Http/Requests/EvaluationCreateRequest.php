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
            'impacto'               => 'required|numeric|min:0|max:8',
            'estado_inicial'        => 'numeric|min:0|max:2',
            'estado_final'          => 'numericmin:0|max:2',
            'description'           => 'required|string',
            'recomendaciones'       => 'string'
        ];
    }
}
