<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class DemandaTurmaGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'demanda_turmas_graduacao';

    public function turma()
    {
        return $this->belongsTo(TurmaGraduacao::class, 'id_turma', 'id_turma');
    }
}
