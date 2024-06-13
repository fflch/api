<?php

namespace App\Utilities;

class SQLBuilderUtils
{
    public static function paginate($query, $request)
    {
        $limit  = $request['pagination']['limit'] ?? 100;
        $page   = $request['pagination']['page']  ?? 1;

        return $query->paginate(
            (int) $limit,
            ['*'],
            'page',
            (int) $page
        );
    }
}
