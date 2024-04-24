<?php

namespace App\Utilities;

class ResourcesUtils
{
    public static function filterColumnsByRequestAndPermission(
        $responseData,
        $accessLevels,
        $userRole,
        $request
    ) {
        $responseData = self::hideAndHashRestrictedColumns(
            $responseData,
            $accessLevels,
            $userRole
        );

        return self::filterColumnsByRequest($responseData, $request);
    }

    private static function filterColumnsByRequest(
        $data,
        $request
    ) {
        if (isset($request->all()['columns'])) {
            $requestedColumns = $request->all()['columns'];
            foreach ($data as &$record) {
                $record = self::getRequestedColumns($record, $requestedColumns);
            }
        }

        return $data;
    }

    private static function hideAndHashRestrictedColumns($data, $accessLevels, $userRole)
    {
        if (
            !isset($accessLevels[$userRole]['HIDE']) ||
            !isset($accessLevels[$userRole]['HASH'])
        ) {
            return ErrorUtils::generateJsonErrorResponse(
                500,
                'Internal Server Error'
            );
        }

        foreach ($data as &$record) {
            CommonUtils::recursiveUnset($record, $accessLevels[$userRole]['HIDE']);
            CommonUtils::recursiveHash($record, $accessLevels[$userRole]['HASH']);
        }

        return $data;
    }

    private static function getRequestedColumns($record, $filter)
    {
        if (empty($filter)) return $record;

        $filtered = array_intersect_key($filter, $record);

        if (in_array("1", $filtered)) {
            return self::selectColumnsByRequest($record, $filtered);
        }

        if (in_array("0", $filtered)) {
            return self::hideColumnsByRequest($record, $filtered);
        }

        return $record;
    }

    private static function hideColumnsByRequest($record, $filtered)
    {
        foreach ($filtered as $k => $v) {
            if ($v === "0") {
                $record = array_diff_key($record, array_flip([$k]));
            }
            if (is_array($v)) {
                if (isset($record[$k])) {
                    $record[$k] = self::getRequestedColumns(
                        $record[$k],
                        $filtered[$k]
                    );
                }
            }
        }

        return $record;
    }

    private static function selectColumnsByRequest($record, $filtered)
    {
        $selected = [];

        foreach ($filtered as $k => $v) {
            if ($v === "1") {
                $selected = array_merge(
                    $selected,
                    array_intersect_key($record, array_flip([$k]))
                );
            }
            if (is_array($v)) {
                if (isset($record[$k])) {
                    $selected[$k] = self::getRequestedColumns(
                        $record[$k],
                        $filtered[$k]
                    );
                }
            }
        }

        return $selected;
    }
}
