<?php

namespace App\Http\Requests\PrivateRequests;

use App\Http\Requests\PublicRequests\PublicEstagiariosRequest;

class PrivateEstagiariosRequest extends PublicEstagiariosRequest
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            'numero_usp' => ['sometimes', 'integer'],
        ]);
    }
}