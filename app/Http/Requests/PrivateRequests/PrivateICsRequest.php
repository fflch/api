<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicICsRequest;

class PrivateICsRequest extends PublicICsRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
            'numero_usp_orientador' => ['sometimes', 'integer'],
        ]);
    }
}