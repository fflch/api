<?php

namespace App\Http\Requests\Servidores;

use App\Http\Requests\BaseDataRequest;

class EstagiariosRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'estagiarios';
        $joined = ['pessoa' => 'pessoas'];

        parent::__construct($primary, $joined);
    }
}
