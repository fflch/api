<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ProcessFiltersTrait;

class BolsaIc extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'bolsas_ic';

    public function iniciacao()
    {
        return $this->belongsTo(Ic::class, 'id_projeto', 'id_projeto');
    }
}
