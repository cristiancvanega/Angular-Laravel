<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EvaluationCustomReportRequest extends Request
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
            'intervention_id'       => 'numeric',
            'user_id'               => 'numeric',
            'descripcion_evidencia' => 'string',
            'impacto'               => 'string',
            'estado_inicial'        => 'string',
            'estado_final'          => 'string',
            'description'           => 'string',
            'recomendaciones'       => 'string'
        ];
    }
}
