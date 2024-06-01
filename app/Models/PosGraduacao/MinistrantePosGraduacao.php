<?php

namespace App\Models\PosGraduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class MinistrantePosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'ministrantes_posgraduacao';

    public function turma()
    {
        return $this->belongsTo(TurmaPosGraduacao::class, 'id_turma', 'id_turma');
    }
}
