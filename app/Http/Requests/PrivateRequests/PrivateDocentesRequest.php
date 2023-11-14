<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicDocentesRequest;
use App\Utilities\ValidationUtils;

class PrivateDocentesRequest extends PublicDocentesRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
            'situacao_atual' => ['sometimes', 'in:' . ValidationUtils::getServidoresSituacoes()],
            'tipo_ingresso' => ['sometimes', 'in:' . ValidationUtils::getServidoresTiposIngresso()],
            'ultima_ocorrencia' => ['sometimes', 'regex:/^[\p{L}0-9\-()]*$/u'],
            'ano_inicio_vinculo' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{4}$|\d{4})$/'],
        ]);
    }
}