<?php

namespace App\Http\Requests\PublicRequests;

use App\Utilities\ValidationUtils;

class PublicDefesasRequest extends PaginationRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'id_defesa' => ['sometimes', 'regex:/^[0-9a-fA-F]{8}$/'],
            'id_posgraduacao' => ['sometimes', 'regex:/^[0-9a-fA-F]{32}$/'],
            'nivel_programa' => ['sometimes', 'in:ME,DO,DD'],
            'codigo_area' => ['sometimes', 'integer'],
            'codigo_programa' => ['sometimes', 'integer'],
            // 'local_defesa' => // ver - corrigir erros e padronizar dados antes
            'mencao_honrosa' => ['sometimes', 'nullable', 'in:' . ValidationUtils::getPGMencoes()],

            'ano_defesa' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}