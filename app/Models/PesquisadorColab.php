<?php

namespace App\Models;

use App\Models\PesquisaAvancada;
use App\Traits\ProcessFiltersTrait;

class PesquisadorColab extends PesquisaAvancada
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('modalidade', '=', 'PC');
    }
}
