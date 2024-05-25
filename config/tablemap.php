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
    'posdocs' => [
        'model' => \App\Models\PosDoc::class,
        'mapping' => \App\Mappings\PosDocMapping::class,
    ],
    'supervisoes_posdoc' => [
        'model' => \App\Models\SupervisaoPosDoc::class,
        'mapping' => \App\Mappings\SupervisaoPosDocMapping::class,
    ],
    'periodos_pesquisa_avancada' => [
        'model' => \App\Models\PeriodoPesquisaAvancada::class,
        'mapping' => \App\Mappings\PeriodoPesquisaAvancadaMapping::class,
    ],
    'bolsas_pesq_avancada' => [
        'model' => \App\Models\BolsaPesquisaAvancada::class,
        'mapping' => \App\Mappings\BolsaPesquisaAvancadaMapping::class,
    ],
    'afastamentos_empresa_pesquisa_avancada' => [
        'model' => \App\Models\AfastamentoEmpresaPesquisaAvancada::class,
        'mapping' => \App\Mappings\AfastamentoEmpresaPesquisaAvancadaMapping::class,
    ],
];
