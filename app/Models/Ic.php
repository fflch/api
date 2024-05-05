<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProcessFiltersTrait;

class Ic extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'iniciacoes';

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function orientador()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp_orientador', 'numero_usp');
    }

    public function bolsas()
    {
        return $this->hasMany(BolsaIc::class, 'id_projeto', 'id_projeto');
    }
}
