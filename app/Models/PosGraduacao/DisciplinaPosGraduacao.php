<?php

namespace App\Models\PosGraduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class DisciplinaPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'disciplinas_posgraduacao';

    public function turmas()
    {
        return $this->hasMany(
            TurmaPosGraduacao::class,
            'codigo_disciplina',
            'codigo_disciplina'
        )->where('versao_disciplina', '=', $this->versao_disciplina);
        // ver: make a single primary key
    }
}
