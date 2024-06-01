<?php

namespace App\Http\Requests\IniciacaoCientifica;

use App\Http\Requests\BaseDataRequest;

class SiicuspRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'trabalhos_siicusp';
        $joined = [
            'participantes' => 'participantes_siicusp',
        ];

        parent::__construct($primary, $joined);
    }
}
