<?php

return [
    'pessoas' => [
        'model' => \App\Models\Pessoas\Pessoa::class,
        'mapping' => \App\Mappings\Pessoas\PessoaMapping::class,
    ],
    'docentes' => [
        'model' => \App\Models\Servidores\Docente::class,
        'mapping' => \App\Mappings\Servidores\DocenteMapping::class,
    ],
    'estagiarios' => [
        'model' => \App\Models\Servidores\Estagiario::class,
        'mapping' => \App\Mappings\Servidores\EstagiarioMapping::class,
    ],
    'funcionarios' => [
        'model' => \App\Models\Servidores\Funcionario::class,
        'mapping' => \App\Mappings\Servidores\FuncionarioMapping::class,
    ],
    'designacoes_servidores' => [
        'model' => \App\Models\Servidores\DesignacaoServidor::class,
        'mapping' => \App\Mappings\Servidores\DesignacaoServidorMapping::class,
    ],
    'ics' => [
        'model' => \App\Models\IniciacaoCientifica\Ic::class,
        'mapping' => \App\Mappings\IniciacaoCientifica\IcMapping::class,
    ],
    'bolsas_ic' => [
        'model' => \App\Models\IniciacaoCientifica\BolsaIc::class,
        'mapping' => \App\Mappings\IniciacaoCientifica\BolsaIcMapping::class,
    ],
    'posdocs' => [
        'model' => \App\Models\PesquisasAvancadas\PosDoc::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\PosDocMapping::class,
    ],
    'supervisoes_posdoc' => [
        'model' => \App\Models\PesquisasAvancadas\SupervisaoPosDoc::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\SupervisaoPosDocMapping::class,
    ],
    'periodos_pesquisa_avancada' => [
        'model' => \App\Models\PesquisasAvancadas\PeriodoPesquisaAvancada::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\PeriodoPesquisaAvancadaMapping::class,
    ],
    'bolsas_pesq_avancada' => [
        'model' => \App\Models\PesquisasAvancadas\BolsaPesquisaAvancada::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\BolsaPesquisaAvancadaMapping::class,
    ],
    'afastamentos_empresa_pesquisa_avancada' => [
        'model' => \App\Models\PesquisasAvancadas\AfastamentoEmpresaPesquisaAvancada::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\AfastamentoEmpresaPesquisaAvancadaMapping::class,
    ],
    'pesquisadores_colab' => [
        'model' => \App\Models\PesquisasAvancadas\PesquisadorColab::class,
        'mapping' => \App\Mappings\PesquisasAvancadas\PesquisadorColabMapping::class,
    ],
    'posgraduacoes' => [
        'model' => \App\Models\PosGraduacao\PosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\PosGraduacaoMapping::class,
    ],
    'orientacoes_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\OrientacaoPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\OrientacaoPosGraduacaoMapping::class,
    ],
    'convenios_posgraduacoes' => [
        'model' => \App\Models\PosGraduacao\ConvenioPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\ConvenioPosGraduacaoMapping::class,
    ],
    'proficiencia_idiomas_pg' => [
        'model' => \App\Models\PosGraduacao\ProficienciaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\ProficienciaPosGraduacaoMapping::class,
    ],
    'bolsas_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\BolsaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\BolsaPosGraduacaoMapping::class,
    ],
    'ocorrencias_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\OcorrenciaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\OcorrenciaPosGraduacaoMapping::class,
    ],
    'defesas_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\DefesaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\DefesaPosGraduacaoMapping::class,
    ],
    'membros_banca_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\MembroBancaPG::class,
        'mapping' => \App\Mappings\PosGraduacao\MembroBancaPGMapping::class,
    ],
    'graduacoes' => [
        'model' => \App\Models\Graduacao\Graduacao::class,
        'mapping' => \App\Mappings\Graduacao\GraduacaoMapping::class,
    ],
    'habilitacoes' => [
        'model' => \App\Models\Graduacao\Habilitacao::class,
        'mapping' => \App\Mappings\Graduacao\HabilitacaoMapping::class,
    ],
    'notas_ingresso_graduacao' => [
        'model' => \App\Models\Graduacao\NotaIngressoGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\NotaIngressoGraduacaoMapping::class,
    ],
    'trancamentos_graduacao' => [
        'model' => \App\Models\Graduacao\TrancamentoGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\TrancamentoGraduacaoMapping::class,
    ],
    'trabalhos_siicusp' => [
        'model' => \App\Models\IniciacaoCientifica\TrabalhoSiicusp::class,
        'mapping' => \App\Mappings\IniciacaoCientifica\TrabalhoSiicuspMapping::class,
    ],
    'participantes_siicusp' => [
        'model' => \App\Models\IniciacaoCientifica\ParticipanteSiicusp::class,
        'mapping' => \App\Mappings\IniciacaoCientifica\ParticipanteSiicuspMapping::class,
    ],
    'disciplinas_graduacao' => [
        'model' => \App\Models\Graduacao\DisciplinaGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\DisciplinaGraduacaoMapping::class,
    ],
    'turmas_graduacao' => [
        'model' => \App\Models\Graduacao\TurmaGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\TurmaGraduacaoMapping::class,
    ],
    'ministrantes_graduacao' => [
        'model' => \App\Models\Graduacao\MinistranteGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\MinistranteGraduacaoMapping::class,
    ],
    'demanda_turmas_graduacao' => [
        'model' => \App\Models\Graduacao\DemandaTurmaGraduacao::class,
        'mapping' => \App\Mappings\Graduacao\DemandaTurmaGraduacaoMapping::class,
    ],
    'disciplinas_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\DisciplinaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\DisciplinaPosGraduacaoMapping::class,
    ],
    'turmas_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\TurmaPosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\TurmaPosGraduacaoMapping::class,
    ],
    'ministrantes_posgraduacao' => [
        'model' => \App\Models\PosGraduacao\MinistrantePosGraduacao::class,
        'mapping' => \App\Mappings\PosGraduacao\MinistrantePosGraduacaoMapping::class,
    ],
    'cursos_ccex' => [
        'model' => \App\Models\CulturaExtensao\CursoCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\CursoCCExMapping::class,
    ],
    'oferecimentos_ccex' => [
        'model' => \App\Models\CulturaExtensao\OferecimentoCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\OferecimentoCCExMapping::class,
    ],
    'coordenadores_ccex' => [
        'model' => \App\Models\CulturaExtensao\CoordenadorCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\CoordenadorCCExMapping::class,
    ],
    'ministrantes_ccex' => [
        'model' => \App\Models\CulturaExtensao\MinistranteCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\MinistranteCCExMapping::class,
    ],
    'inscricoes_ccex' => [
        'model' => \App\Models\CulturaExtensao\InscricaoCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\InscricaoCCExMapping::class,
    ],
    'matriculas_ccex' => [
        'model' => \App\Models\CulturaExtensao\MatriculaCCEx::class,
        'mapping' => \App\Mappings\CulturaExtensao\MatriculaCCExMapping::class,
    ],
];
