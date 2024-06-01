<?php

namespace App\Models\Pessoas;

use App\Traits\ProcessFiltersTrait;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use ProcessFiltersTrait;

    protected $connection = 'etl';
    protected $table = 'pessoas';
}
