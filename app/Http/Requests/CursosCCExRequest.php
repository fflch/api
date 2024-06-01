<?php

namespace App\Http\Requests;

class CursosCCExRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'cursos_ccex';
        $joined = [
            'oferecimentos' => 'oferecimentos_ccex'
        ];

        parent::__construct($primary, $joined);
    }
}
