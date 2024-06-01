<?php

namespace App\Models\CulturaExtensao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class InscricaoCCEx extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'inscricoes_ccex';

    public function oferecimento()
    {
        return $this->belongsTo(
            OferecimentoCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }
}
