<?php

namespace App\Models\PesquisasAvancadas;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProcessFiltersTrait;

class BolsaPesquisaAvancada extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'bolsas_pesq_avancada';

    public function posdoc()
    {
        return $this->belongsTo(PesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }
}
