<?php

namespace App\Utilities;

use App\Models\RecordsResponse;
use App\Utilities\CommonUtils;

class ServicesUtils
{
    public function buildResponse(
        array $validated,
        string $repository,
        array $restricted = null,
        string $warning = null
    ) {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $repo = new $repository($validated);

        $count = $repo->fetchCount();
        $records = $repo->fetchRecords($page, $limit, $restricted['hide']);

        if (!empty($restricted['hash'])) {
            $this->hashRecordsValues($records, $restricted['hash']);
        }

        return new RecordsResponse(
            $count,
            $page,
            $limit,
            $records,
            $warning
        );
    }

    private function hashRecordsValues($records, $hashColumns)
    {
        $records = $records->map(function ($item) use ($hashColumns) {
            foreach ($hashColumns as $col) {
                if (property_exists($item, $col)) {
                    $item->{$col} = CommonUtils::hashValue($item->{$col}, 16);
                }
            }
            return $item;
        });
    }
}
