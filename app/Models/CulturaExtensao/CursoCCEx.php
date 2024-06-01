<?php

namespace App\Models\CulturaExtensao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class CursoCCEx extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'cursos_culturaextensao';

    public function oferecimentos()
    {
        return $this->hasMany(
            OferecimentoCCEx::class,
            'codigo_curso_ceu',
            'codigo_curso_ceu'
        );
    }
}
