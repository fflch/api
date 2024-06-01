<?php

namespace App\Models\Graduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class MinistranteGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'ministrantes_graduacao';

    public function turma()
    {
        return $this->belongsTo(TurmaGraduacao::class, 'id_turma', 'id_turma');
    }
}
