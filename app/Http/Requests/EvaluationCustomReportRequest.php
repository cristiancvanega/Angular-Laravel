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
            'intervencion_id'       => 'numeric',
            'user_id'               => 'numeric',
            'date'                  => 'date',
            'descripcion_evidencia' => 'string',
            'impacto'               => 'string',
            'estado_inicial'        => 'numeric',
            'estado_final'          => 'numeric',
            'description'           => 'string',
            'recomendaciones'       => 'string'
        ];
    }
}
