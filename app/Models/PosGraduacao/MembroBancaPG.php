<?php

namespace App\Models\PosGraduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class MembroBancaPG extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'bancas_posgraduacao';

    public function defesa()
    {
        return $this->belongsTo(DefesaPosGraduacao::class, 'id_defesa', 'id_defesa');
    }
}
