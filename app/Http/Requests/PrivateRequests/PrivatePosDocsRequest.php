<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicPosDocsRequest;

class PrivatePosDocsRequest extends PublicPosDocsRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
            'numero_usp_supervisor' => ['sometimes', 'integer'],
        ]);
    }
}