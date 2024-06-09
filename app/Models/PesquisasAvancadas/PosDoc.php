<?php

namespace App\Models\PesquisasAvancadas;

use App\Traits\ModelAccessControlTrait;
use App\Traits\ProcessFiltersTrait;

class PosDoc extends PesquisaAvancada
{
    use ProcessFiltersTrait, ModelAccessControlTrait;

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
