<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupervisaoPosDoc extends Model
{
    protected $connection = 'etl';
    protected $table = 'supervisoes_pesq_avancada';

    public function posdoc()
    {
        return $this->belongsTo(PosDoc::class, 'id_projeto', 'id_projeto');
    }

    public function supervisor()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp_supervisor', 'numero_usp');
    }
}
