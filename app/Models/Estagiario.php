<?php

namespace App\Models;

use App\Models\VinculoServidor;
use App\Traits\ProcessFiltersTrait;

class Estagiario extends VinculoServidor
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('vinculo', '=', 'Estagiário');
    }
}
