<?php

namespace App\Models\Graduacao;

use App\Models\Pessoas\Pessoa;
use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class Graduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'graduacoes';

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function habilitacoes()
    {
        return $this->hasMany(Habilitacao::class, 'id_graduacao', 'id_graduacao');
    }

    public function trancamentos()
    {
        return $this->hasMany(TrancamentoGraduacao::class, 'id_graduacao', 'id_graduacao');
    }

    public function notasIngresso()
    {
        return $this->hasMany(NotaIngressoGraduacao::class, 'id_graduacao', 'id_graduacao');
    }
}
