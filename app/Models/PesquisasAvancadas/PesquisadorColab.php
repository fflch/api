<?php

namespace App\Models\PesquisasAvancadas;

use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;

class PesquisadorColab extends PesquisaAvancada
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('modalidade', '=', 'PC');
    }
}
