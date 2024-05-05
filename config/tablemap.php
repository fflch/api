<?php

return [
    'pessoas' => [
        'model' => \App\Models\Pessoa::class,
        'mapping' => \App\Mappings\PessoaMapping::class,
    ],
    'docentes' => [
        'model' => \App\Models\Docente::class,
        'mapping' => \App\Mappings\DocenteMapping::class,
    ],
    'estagiarios' => [
        'model' => \App\Models\Estagiario::class,
        'mapping' => \App\Mappings\EstagiarioMapping::class,
    ],
    'funcionarios' => [
        'model' => \App\Models\Funcionario::class,
        'mapping' => \App\Mappings\FuncionarioMapping::class,
    ],
    'ics' => [
        'model' => \App\Models\Ic::class,
        'mapping' => \App\Mappings\IcMapping::class,
    ],
    'bolsas_ic' => [
        'model' => \App\Models\BolsaIc::class,
        'mapping' => \App\Mappings\BolsaIcMapping::class,
    ],
];
