<?php

namespace App\Models;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class MinistranteCCEx extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'ministrantes_ccex';

    public function oferecimento()
    {
        return $this->belongsTo(
            OferecimentoCCEx::class,
            'codigo_oferecimento',
            'codigo_oferecimento'
        );
    }
}
