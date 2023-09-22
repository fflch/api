<?php

namespace App\Http\Requests;

use App\Utilities\ValidationUtils;

class DefesasRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_defesa' => ['sometimes', 'regex:/^[0-9a-fA-F]{8}$/'],
            'id_aluno' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'id_posgraduacao' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'nivel_programa' => ['sometimes', 'in:ME,DO,DD'],
            'codigo_programa' => ['sometimes', 'integer'],
            'codigo_area' => ['sometimes', 'integer'],
            // 'local_defesa' => // corrigir erros e padronizar dados antes
            'mencao_honrosa' => ['sometimes', 'nullable', 'in:' . ValidationUtils::getPGMencoes()],

            'ano_defesa' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}