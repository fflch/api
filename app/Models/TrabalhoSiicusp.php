<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class TrabalhoSiicusp extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'siicusp_trabalhos';

    public function participantes()
    {
        return $this->hasMany(ParticipanteSiicusp::class, 'id_trabalho', 'id_trabalho');
    }
}
