<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class PosGraduacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'posgraduacoes';

    public function aluno()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function orientacoes()
    {
        return $this->hasMany(OrientacaoPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function convenios()
    {
        return $this->hasMany(ConvenioPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function bolsas()
    {
        return $this->hasMany(BolsaPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function ocorrencias()
    {
        return $this->hasMany(OcorrenciaPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function proficiencias()
    {
        return $this->hasMany(ProficienciaPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }

    public function defesa()
    {
        return $this->hasOne(DefesaPosGraduacao::class, 'id_posgraduacao', 'id_posgraduacao');
    }
}
