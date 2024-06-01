<?php

namespace App\Models\PesquisasAvancadas;

use Illuminate\Database\Eloquent\Model;

class PeriodoPesquisaAvancada extends Model
{
    protected $connection = 'etl';
    protected $table = 'periodos_pesq_avancada';

    public function posdoc()
    {
        return $this->belongsTo(PesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }
}
