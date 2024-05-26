<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class ConvenioPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'posgraduacoes_conveniadas';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }
}
