<?php

namespace App\Http\Requests;

class DocentesRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'docentes';
        $joined = ['pessoa' => 'pessoas'];

        parent::__construct($primary, $joined);
    }
}
