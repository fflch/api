<?php

namespace App\Http\Services;

use App\Utilities\ServicesUtils;
use App\Http\Repositories\DocentesRepository;

class DocentesService
{
    public function getDocentes(Array $validated)
    {
        $warning = "Esteja ciente de que nossa API apresenta " .
        "apenas o vínculo mais recente de um docente " . 
        "por situação (por exemplo, se um mesmo indivíduo tem " . 
        "dois vínculos já desativados, apenas o último será " .
        "exibido). Isso significa que os vínculos históricos " . 
        "não estão totalmente representados nos dados. " . 
        "Além disso, registros muito antigos podem conter " . 
        "imprecisões quanto às datas.";


        return ServicesUtils::buildResponse(
            $validated, 
            DocentesRepository::class,
            $warning
        );
    }
}
