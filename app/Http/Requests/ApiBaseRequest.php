<?php

namespace App\Http\Requests;

use App\Utilities\ErrorUtils;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class ApiBaseRequest extends FormRequest
{
    public function rules()
    {
        return [
            'pagination.page' => ['sometimes', 'integer'],
            'pagination.limit' => ['sometimes', 'integer'],
        ];
    }
}
