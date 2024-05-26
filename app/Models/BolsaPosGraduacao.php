<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class BolsaPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'bolsas_posgraduacao';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }
}
