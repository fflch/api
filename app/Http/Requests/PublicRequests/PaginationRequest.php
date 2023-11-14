<?php

namespace App\Http\Requests\PublicRequests;

class PaginationRequest extends ApiBaseRequest
{
    public function rules()
    {
        return [
            'page' => ['sometimes', 'integer'],
            'limit' => ['sometimes', 'integer'],
        ];
    }
}
