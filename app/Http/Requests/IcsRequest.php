<?php

namespace App\Http\Requests;

class IcsRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'ics';
        $joined = [
            'aluno' => 'pessoas',
            'orientador' => 'pessoas',
            'bolsas' => 'bolsas_ic'
        ];

        parent::__construct($primary, $joined);
    }
}
