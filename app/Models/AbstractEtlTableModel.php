<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractEtlTableModel extends Model
{
    abstract public static function getAccessLevels();

    abstract public static function getColumnsAndFilters();
}
