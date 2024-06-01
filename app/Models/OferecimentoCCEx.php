<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class OferecimentoCCEx extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'oferecimentos_ccex';

    public function curso()
    {
        return $this->belongsTo(
            CursoCCEx::class,
            'codigo_curso_ceu',
            'codigo_curso_ceu'
        );
    }

    public function coordenadores()
    {
        return $this->hasMany(
            CoordenadorCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }

    public function inscricoes()
    {
        return $this->hasMany(
            InscricaoCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }

    public function matriculas()
    {
        return $this->hasMany(
            MatriculaCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }

    public function ministrantes()
    {
        return $this->hasMany(
            MinistranteCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }
}
