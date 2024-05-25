<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesquisaAvancada extends Model
{
    protected $connection = 'etl';
    protected $table = 'pesquisas_avancadas';

    public function pesquisador()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function periodos()
    {
        return $this->hasMany(PeriodoPesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }

    public function bolsas()
    {
        return $this->hasMany(BolsaPesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }

    public function afastamentosEmpresa()
    {
        return $this->hasMany(AfastamentoEmpresaPesquisaAvancada::class, 'id_projeto', 'id_projeto');
    }
}
