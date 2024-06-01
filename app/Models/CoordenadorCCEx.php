<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class CoordenadorCCEx extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'coordenadores_ccex';

    public function oferecimento()
    {
        return $this->belongsTo(
            OferecimentoCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }
}
