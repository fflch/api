<?php

namespace App\Models;

use App\Utilities\SQLBuilderUtils;

class RecordsResponse 
{
    public function __construct(
        int $totalRecords,
        int $page,
        int $limit,
        object $records,
        ?string $warning
    )
    {
        isset($warning) ? $this->warning = $warning : null;
        $this->totalRecords = $totalRecords;
        $this->page = $page;
        $this->limit = $limit;
        $this->displayingRecords = SQLBuilderUtils::rangeDisplay($page, $limit, $totalRecords);
        $this->records = $records;
    }
}
