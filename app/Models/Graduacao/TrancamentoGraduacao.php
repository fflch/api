<?php

namespace App\Models\Graduacao;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class TrancamentoGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'trancamentos_graduacao';

    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class, 'id_graduacao', 'id_graduacao');
    }
}
