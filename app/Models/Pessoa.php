<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $connection = 'etl';

    public function vinculosSevidores()
    {
        return $this->hasMany(VinculoServidor::class, 'numero_usp', 'numero_usp');
    }

    public function iniciacoes()
    {
        return $this->hasMany(Ic::class, 'numero_usp', 'numero_usp');
    }
}
