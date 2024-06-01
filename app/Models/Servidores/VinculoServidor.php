<?php

namespace App\Models\Servidores;

use App\Models\Pessoas\Pessoa;
use Illuminate\Database\Eloquent\Model;

class VinculoServidor extends Model
{
    protected $connection = 'etl';
    protected $table = 'vinculos_servidores';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }

    public function designacoes()
    {
        return $this->hasMany(DesignacaoServidor::class, 'id_vinculo', 'id_vinculo');
    }
}
