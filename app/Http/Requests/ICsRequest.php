<?php

namespace App\Http\Requests;

use App\Utilities\ValidationUtils;

class ICsRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_projeto' => ['sometimes', 'regex:/^\d{4}-\d+$/'],
            'id_aluno' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'situacao_projeto' => ['sometimes', 'in:' . ValidationUtils::getICSituacoesOptions()],
            'codigo_departamento' => ['sometimes', 'integer'],
            'nome_departamento' => ['sometimes', 'in:' . ValidationUtils::getDptoOptions()],
            'id_orientador' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],

            'ano_inicio' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_fim' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}
