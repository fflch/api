<?php

namespace App\Models;

use App\Utilities\SQLBuilderUtils;

class ResponseModel 
{
    public function __construct(
        int $totalRecords,
        int $page,
        int $limit,
        object $data
    )
    {   
        $this->totalRecords = $totalRecords;
        $this->page = $page;
        $this->limit = $limit;
        $this->displayingRecords = SQLBuilderUtils::rangeDisplay($page, $limit, $totalRecords);
        $this->data = $data;
    }
}
