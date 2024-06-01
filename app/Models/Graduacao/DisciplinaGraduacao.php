<?php

namespace App\Models\Graduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class DisciplinaGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'disciplinas_graduacao';

    public function turmas()
    {
        return $this->hasMany(
            TurmaGraduacao::class,
            'codigo_disciplina',
            'codigo_disciplina'
        )->where('versao_disciplina', '=', $this->versao_disciplina);
        // ver: make a single primary key
    }
}
