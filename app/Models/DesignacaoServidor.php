<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProcessFiltersTrait;

class DesignacaoServidor extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'designacoes_servidores';

    public function vinculoServidor()
    {
        return $this->belongsTo(VinculoServidor::class, 'id_vinculo', 'id_vinculo');
    }
}
