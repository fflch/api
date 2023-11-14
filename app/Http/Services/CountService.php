<?php

namespace App\Http\Services;

use App\Http\Requests\PublicRequests\PublicICsRequest;
use App\Http\Requests\PrivateRequests\PrivateICsRequest;
use App\Http\Repositories\ICsRepository;
use App\Http\Requests\PublicRequests\PublicPosDocsRequest;
use App\Http\Requests\PrivateRequests\PrivatePosDocsRequest;
use App\Http\Repositories\PosDocsRepository;
use App\Http\Requests\PublicRequests\PublicDefesasRequest;
use App\Http\Requests\PrivateRequests\PrivateDefesasRequest;
use App\Http\Repositories\DefesasRepository;
use App\Http\Requests\PublicRequests\PublicPesquisadoresColabRequest;
use App\Http\Requests\PrivateRequests\PrivatePesquisadoresColabRequest;
use App\Http\Repositories\PesquisadoresColabRepository;
use App\Http\Requests\PublicRequests\PublicDocentesRequest;
use App\Http\Requests\PrivateRequests\PrivateDocentesRequest;
use App\Http\Repositories\DocentesRepository;
use App\Http\Requests\PublicRequests\PublicFuncionariosRequest;
use App\Http\Requests\PrivateRequests\PrivateFuncionariosRequest;
use App\Http\Repositories\FuncionariosRepository;
use App\Http\Requests\PublicRequests\PublicEstagiariosRequest;
use App\Http\Requests\PrivateRequests\PrivateEstagiariosRequest;
use App\Http\Repositories\EstagiariosRepository;

class CountService
{
    public function fetchCount($request, $access)
    {
        $pathSections = explode('/', $request->path());
        $endpoint = $pathSections[count($pathSections)-2];

        self::validateRequest($endpoint, $request, $access);
        $validated = $request->query->all();

        return ['total records' => self::countRecords($endpoint, $validated)];
    }

    private function validateRequest($endpoint, $request, $access)
    {
        switch ($access) {
            case 'public':
                switch ($endpoint) {
                    case 'ics':
                        $request->validate((new PublicICsRequest)->rules());
                        break;
                    case 'posdocs':
                        $request->validate((new PublicPosDocsRequest)->rules());
                        break;
                    case 'defesas':
                        $request->validate((new PublicDefesasRequest)->rules());
                        break;
                    case 'pcs':
                        $request->validate((new PublicPesquisadoresColabRequest)->rules());
                        break;
                    case 'docentes':
                        $request->validate((new PublicDocentesRequest)->rules());
                        break;
                    case 'funcionarios':
                        $request->validate((new PublicFuncionariosRequest)->rules());
                        break;
                    case 'estagiarios':
                        $request->validate((new PublicEstagiariosRequest)->rules());
                        break;
                    default:
                        abort(response()->json(['message' => "The requested endpoint could not be validated. It likely does not exist."], 404));
                }
                break;
            case 'private':
                switch ($endpoint) {
                    case 'ics':
                        $request->validate((new PrivateICsRequest)->rules());
                        break;
                    case 'posdocs':
                        $request->validate((new PrivatePosDocsRequest)->rules());
                        break;
                    case 'defesas':
                        $request->validate((new PrivateDefesasRequest)->rules());
                        break;
                    case 'pcs':
                        $request->validate((new PrivatePesquisadoresColabRequest)->rules());
                        break;
                    case 'docentes':
                        $request->validate((new PrivateDocentesRequest)->rules());
                        break;
                    case 'funcionarios':
                        $request->validate((new PrivateFuncionariosRequest)->rules());
                        break;
                    case 'estagiarios':
                        $request->validate((new PrivateEstagiariosRequest)->rules());
                        break;
                    default:
                        abort(response()->json(['message' => "The requested endpoint could not be validated. It likely does not exist."], 404));
                }
                break;
            default:
            abort(response()->json(['message' => "The requested endpoint could not be validated. It likely does not exist."], 404));
        }
    }

    private function countRecords($endpoint, $validated)
    {
        switch ($endpoint) {
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
