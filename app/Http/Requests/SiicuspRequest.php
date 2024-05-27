<?php

namespace App\Http\Requests;

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
