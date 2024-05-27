<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class TurmaGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'turmas_graduacao';

    public function disciplina()
    {
        return $this->belongsTo(
            DisciplinaGraduacao::class,
            'codigo_disciplina',
            'codigo_disciplina'
        )->where('versao_disciplina', '=', $this->versao_disciplina);
        // ver: make a single primary key
    }

    public function ministrantes()
    {
        return $this->hasMany(MinistranteGraduacao::class, 'id_turma', 'id_turma');
    }
}
