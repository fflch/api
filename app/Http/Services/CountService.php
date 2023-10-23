<?php

namespace App\Http\Services;

use App\Http\Requests\ICsRequest;
use App\Http\Repositories\ICsRepository;
use App\Http\Requests\PosDocsRequest;
use App\Http\Repositories\PosDocsRepository;
use App\Http\Requests\DefesasRequest;
use App\Http\Repositories\DefesasRepository;
use App\Http\Requests\PesquisadoresColabRequest;
use App\Http\Repositories\PesquisadoresColabRepository;
use App\Http\Requests\DocentesRequest;
use App\Http\Repositories\DocentesRepository;
use App\Http\Requests\FuncionariosRequest;
use App\Http\Repositories\FuncionariosRepository;
use App\Http\Requests\EstagiariosRequest;
use App\Http\Repositories\EstagiariosRepository;

class CountService
{
    public function fetchCount($request)
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
            case 'defesas':
                $request->validate(DefesasRequest::rules());
                break;
            case 'pcs':
                $request->validate(PesquisadoresColabRequest::rules());
                break;
            case 'docentes':
                $request->validate(DocentesRequest::rules());
                break;
            case 'funcionarios':
                $request->validate(FuncionariosRequest::rules());
                break;
            case 'estagiarios':
                $request->validate(EstagiariosRequest::rules());
                break;
            default:
                abort(response()->json(['message' => "The requested endpoint could not be validated. It likely does not exist."], 404));
        }
    }

    private function countRecords($endpoint, $validated)
    {
        switch($endpoint) {
            case 'ics':
                return (new ICsRepository($validated))->fetchCount();
            case 'posdocs':
                return (new PosDocsRepository($validated))->fetchCount();
            case 'defesas':
                return (new DefesasRepository($validated))->fetchCount();
            case 'pcs':
                return (new PesquisadoresColabRepository($validated))->fetchCount();
            case 'docentes':
                return (new DocentesRepository($validated))->fetchCount();
            case 'funcionarios':
                return (new FuncionariosRepository($validated))->fetchCount();
            case 'estagiarios':
                return (new EstagiariosRepository($validated))->fetchCount();
            default:
                abort(response()->json(['message' => "Error"], 500));
        }
    }
}
