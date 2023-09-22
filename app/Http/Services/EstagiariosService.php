<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\EstagiariosRepository;

class EstagiariosService
{
    public function getEstagiarios(Array $validated)
    {
        $warning = "Esteja ciente de que nossa API apresenta " .
        "apenas o vínculo mais recente de um estagiário " . 
        "por situação (por exemplo, se um mesmo indivíduo tem " . 
        "dois vínculos já desativados, apenas o último será " .
        "exibido). Isso significa que os vínculos históricos " . 
        "não estão totalmente representados nos dados.";

        return ServicesUtils::buildResponse(
            $validated, 
            EstagiariosRepository::class
        );
    }
}
