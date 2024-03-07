<?php

namespace App\Http\Requests\PublicRequests;

use App\Utilities\ValidationUtils;

class PublicICsRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_projeto' => ['sometimes', 'regex:/^\d{1,4}-\d+$/'],
            'situacao_projeto' => ['sometimes', 'in:' . ValidationUtils::getICSituacoesOptions()],
            'codigo_departamento' => ['sometimes', 'integer'],
            'nome_departamento' => ['sometimes', 'in:' . ValidationUtils::getDptoOptions()],

            'ano_inicio' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{1,4}$|\d{1,4})$/'],
            'ano_fim' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{1,4}$|\d{1,4})$/'],
        ]);
    }
}
