<?php

namespace App\Utilities;

class WarningUtils
{
    const vinculos = "Esteja ciente de que nossa API apresenta " .
        "apenas o vínculo mais recente de um estagiário/funcionário/docente " .
        "por situação (por exemplo, se um mesmo indivíduo tem " .
        "dois vínculos já desativados, apenas o último será " .
        "exibido). Isso significa que os vínculos históricos " .
        "não estão totalmente representados nos dados. " .
        "Além disso, registros muito antigos podem conter " .
        "imprecisões quanto às datas.";
}
