<?php

namespace App\Http\Services;

use App\Http\Repositories\PosDocsRepository;
use App\Models\ResponseModel;

class PosDocsService
{
    public function getPosDocs(Array $validated)
    {
        $page = $validated['page'] ?? 1;
        $limit = $validated['limit'] ?? 100;

        $posdoc = new PosDocsRepository($validated);

        $count = $posdoc->getCount();
        $data = $posdoc->getData($page, $limit);

        return new ResponseModel(
            $count,
            $page,
            $limit,
            $data,
        );
    }
}
