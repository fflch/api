<?php

namespace App\Utilities;

use App\Models\RecordsResponse;

class ServicesUtils
{
    public function buildResponse(array $validated, string $repository, string $warning = null)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $repo = new $repository($validated);

        $count = $repo->fetchCount();
        $records = $repo->fetchRecords($page, $limit);

        return new RecordsResponse(
            $count,
            $page,
            $limit,
            $records,
            $warning
        );
    }
}