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
    'pesquisadores_colab' => [
        'model' => \App\Models\PesquisadorColab::class,
        'mapping' => \App\Mappings\PesquisadorColabMapping::class,
    ],
    'posgraduacoes' => [
        'model' => \App\Models\PosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacaoMapping::class,
    ],
    'orientacoes_posgraduacao' => [
        'model' => \App\Models\OrientacaoPosGraduacao::class,
        'mapping' => \App\Mappings\OrientacaoPosGraduacaoMapping::class,
    ],
    'convenios_posgraduacoes' => [
        'model' => \App\Models\ConvenioPosGraduacao::class,
        'mapping' => \App\Mappings\ConvenioPosGraduacaoMapping::class,
    ],
    'proficiencia_idiomas_pg' => [
        'model' => \App\Models\ProficienciaPosGraduacao::class,
        'mapping' => \App\Mappings\ProficienciaPosGraduacaoMapping::class,
    ],
    'bolsas_posgraduacao' => [
        'model' => \App\Models\BolsaPosGraduacao::class,
        'mapping' => \App\Mappings\BolsaPosGraduacaoMapping::class,
    ],
    'ocorrencias_posgraduacao' => [
        'model' => \App\Models\OcorrenciaPosGraduacao::class,
        'mapping' => \App\Mappings\OcorrenciaPosGraduacaoMapping::class,
    ],
    'defesas_posgraduacao' => [
        'model' => \App\Models\DefesaPosGraduacao::class,
        'mapping' => \App\Mappings\DefesaPosGraduacaoMapping::class,
    ],
    'membros_banca_posgraduacao' => [
        'model' => \App\Models\MembroBancaPG::class,
        'mapping' => \App\Mappings\MembroBancaPGMapping::class,
    ],
];
