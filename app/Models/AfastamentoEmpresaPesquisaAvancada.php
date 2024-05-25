<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProcessFiltersTrait;

class AfastamentoEmpresaPesquisaAvancada extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'afastempresas_pesq_avancada';

    public function posdoc()
    {
        return $this->belongsTo(PesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }
}
