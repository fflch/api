<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class Habilitacao extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'habilitacoes';

    public function graduacao()
    {
        return $this->belongsTo(Graduacao::class, 'id_graduacao', 'id_graduacao');
    }
}
