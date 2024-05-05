<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VinculoServidor extends Model
{
    protected $connection = 'etl';
    protected $table = 'vinculos_servidores';

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'numero_usp', 'numero_usp');
    }
}
