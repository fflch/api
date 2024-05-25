<?php

namespace App\Models;

use App\Models\PesquisaAvancada;
use App\Traits\ProcessFiltersTrait;

class PosDoc extends PesquisaAvancada
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('modalidade', '=', 'PD');
    }

    public function supervisoes()
    {
        return $this->hasMany(SupervisaoPosDoc::class, 'id_projeto', 'id_projeto');
    }
}
