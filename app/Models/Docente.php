<?php

namespace App\Models;

use App\Models\VinculoServidor;
use App\Traits\ProcessFiltersTrait;

class Docente extends VinculoServidor
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';

    public function newQuery()
    {
        return parent::newQuery()->where('vinculo', '=', 'Docente');
    }
}
