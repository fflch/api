<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class ProficienciaPosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'proficiencia_idiomas_pg';

    public function posgraduacao()
    {
        return $this->belongsTo(PosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }
}
