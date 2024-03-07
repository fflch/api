<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicFuncionariosRequest;

class PrivateFuncionariosRequest extends PublicFuncionariosRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
            'ultima_ocorrencia' => ['sometimes', 'regex:/^[\p{L}0-9\-()]*$/u'],
            'ano_inicio_vinculo' => ['sometimes', 'regex:/^((gt|lt|gte|lte)\d{1,4}$|\d{1,4})$/'],
        ]);
    }
}