<?php

namespace App\Http\Requests;

use App\Utilities\ValidationUtils;

class PesquisadoresColabRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_projeto' => ['sometimes', 'regex:/^\d{4}-\d+$/'],
            'id_pesquisador' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'situacao_projeto' => ['sometimes', 'in:' . ValidationUtils::getPASituacoesOptions()],
            'codigo_departamento' => ['sometimes', 'integer'],
            'nome_departamento' => ['sometimes', 'in:' . ValidationUtils::getDptoOptions()],
            'ano_inicio' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
            'ano_fim' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}
