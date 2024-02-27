<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    protected $query;

    public function __construct($validated)
    {
        $this->query = DB::connection('etl')->table('');
        $this->buildFromClause();
        $this->buildWhereClause($validated);
    }

    public function fetchRecords($page, $limit, $columnsToHide)
    {
        $this->buildSelectClause($columnsToHide);
        $this->query->paginate($limit, ['*'], 'page', $page);

        return $this->query->get();
    }

    public function fetchCount()
    {
        return $this->query->count();
    }

    abstract protected function buildSelectClause($columnsToHide);

    abstract protected function buildFromClause();

    abstract protected function buildWhereClause($validated);

}