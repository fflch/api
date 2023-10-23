<?php

namespace App\Http\Repositories;

use Illuminate\Support\Facades\DB;
use App\Utilities\SQLBuilderUtils;

abstract class BaseRepository
{
    public function __construct($validated) {
        $this->peppers = SQLBuilderUtils::getPepperHashes();
        $this->query = DB::table('');
        $this->buildFromClause();
        $this->buildWhereClause($validated);
    }

    public function fetchRecords($page, $limit)
    {
        $this->buildSelectClause();
        $this->query->paginate($limit, 'page', $page);

        return $this->query->get();
    }
    
    public function fetchCount()
    {
        return $this->query->count();
    }

    abstract protected function buildSelectClause();

    abstract protected function buildFromClause();

    abstract protected function buildWhereClause($validated);

}