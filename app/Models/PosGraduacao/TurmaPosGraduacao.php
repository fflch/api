<?php

namespace App\Models\PosGraduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class TurmaPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'turmas_posgraduacao';

    public function disciplina()
    {
        return $this->belongsTo(
            DisciplinaPosGraduacao::class,
            'codigo_disciplina',
            'codigo_disciplina'
        )->where('versao_disciplina', '=', $this->versao_disciplina);
        // ver: make a single primary key
    }

    public function ministrantes()
    {
        return $this->hasMany(MinistrantePosGraduacao::class, 'id_turma', 'id_turma');
    }
}
