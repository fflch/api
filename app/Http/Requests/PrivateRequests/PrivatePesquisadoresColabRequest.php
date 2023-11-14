<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicPesquisadoresColabRequest;

class PrivatePesquisadoresColabRequest extends PublicPesquisadoresColabRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
        ]);
    }
}