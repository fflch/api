<?php

namespace App\Models\Servidores;

use App\Traits\ProcessFiltersTrait;

class Funcionario extends VinculoServidor
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('vinculo', '=', 'Funcionário');
    }
}
