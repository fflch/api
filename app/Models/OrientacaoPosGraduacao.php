<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class OrientacaoPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'orientacoes_posgraduacao';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function orientador()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp_orientador', 'numero_usp');
    }
}
