<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class ParticipanteSiicusp extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'siicusp_participantes';

    public function trabalho()
    {
        return $this->belongsTo(TrabalhoSiicusp::class, 'id_trabalho', 'id_trabalho');
    }
}
