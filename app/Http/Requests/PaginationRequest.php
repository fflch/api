<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaginationRequest extends FormRequest
{
    public function rules()
    {   
        return [
            'page' => ['sometimes', 'integer'],
            'limit' => ['sometimes', 'integer'],
        ];
    }
}
