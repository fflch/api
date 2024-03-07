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
        $displayRange = 
            SQLBuilderUtils::displayRange($page, $limit, $totalRecords);

        isset($warning) ? $this->warning = $warning : null;
        $this->totalRecords = $totalRecords;
        $this->page = $page;
        $this->limit = $limit;
        $this->topRecord = $displayRange['lowerLimit'];
        $this->bottomRecord = $displayRange['upperLimit'];
        $this->records = $records;
    }
}
