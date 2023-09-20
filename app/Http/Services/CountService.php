<?php

namespace App\Http\Services;

use App\Http\Requests\ICsRequest;
use App\Http\Repositories\ICsRepository;
use App\Http\Requests\PosDocsRequest;
use App\Http\Repositories\PosDocsRepository;

class CountService
{
    public function getCount($request)
    {
        $endpoint = explode('/', $request->path())[0];

        self::validateRequest($endpoint, $request);
        $validated = $request->query->all();

        return ['total records' => self::countRecords($endpoint, $validated)];
    }

    private function validateRequest($endpoint, $request)
    {
        switch($endpoint) {
            case 'ics':
                $request->validate(ICsRequest::rules());
                break;
            case 'posdocs':
                $request->validate(PosDocsRequest::rules());
                break;
            default:
                abort(response()->json(['message' => "The requested endpoint could not be validated. It likely does not exist."], 404));
        }
    }

    private function countRecords($endpoint, $validated)
    {
        switch($endpoint) {
            case 'ics':
                return (new ICsRepository($validated))->getCount();
            case 'posdocs':
                return (new PosDocsRepository($validated))->getCount();
            default:
                abort(response()->json(['message' => "Error"], 500));
        }
    }
}