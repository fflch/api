<?php

namespace App\Http\Resources\PosGraduacao;

use Illuminate\Http\Resources\Json\JsonResource;

class DisciplinaPosGraduacaoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'codigo_disciplina' => $this->codigo_disciplina,
            'versao_disciplina' => $this->versao_disciplina,
            'departamento' => $this->departamento,
            'nome_disciplina' => $this->nome_disciplina,
            'tipo_curso' => $this->tipo_curso,
            'situacao_disciplina' => $this->situacao_disciplina,
            'data_proposicao_disciplina' => $this->data_proposicao_disciplina,
            'data_ativacao_disciplina' => $this->data_ativacao_disciplina,
            'data_desativacao_disciplina' => $this->data_desativacao_disciplina,
            'codigo_area' => $this->codigo_area,
            'nome_area' => $this->nome_area,
            'codigo_programa' => $this->codigo_programa,
            'nome_programa' => $this->nome_programa,
            'duracao_disciplina_semanas' => $this->duracao_disciplina_semanas,
            'carga_horaria_teorica' => $this->carga_horaria_teorica,
            'carga_horaria_pratica' => $this->carga_horaria_pratica,
            'carga_horaria_estudo' => $this->carga_horaria_estudo,
            'carga_horaria_total' => $this->carga_horaria_total,
            'total_creditos' => $this->total_creditos,
            'formato_disciplina' => $this->formato_disciplina,
            'turmas' => $this->mapTurmas(),
        ];
    }

    private function mapTurmas()
    {
        return $this->turmas->map(function ($turma) {
            return [
                'id_turma' => $turma->id_turma,
                'codigo_disciplina' => $turma->codigo_disciplina,
                'versao_disciplina' => $turma->versao_disciplina,
                'codigo_turma' => $turma->codigo_turma,
                'situacao_turma' => $turma->situacao_turma,
                'data_inicio_turma' => $turma->data_inicio_turma,
                'data_fim_turma' => $turma->data_fim_turma,
                'vagas_regulares' => $turma->vagas_regulares,
                'vagas_especiais' => $turma->vagas_especiais,
                'vagas_total' => $turma->vagas_total,
                'num_inscritos' => $turma->num_inscritos,
                'num_matriculas_deferidas' => $turma->num_matriculas_deferidas,
                'num_matriculas_indeferidas' => $turma->num_matriculas_indeferidas,
                'num_matriculas_canceladas' => $turma->num_matriculas_canceladas,
                'consolidacao_turma' => $turma->consolidacao_turma,
                'consolidacao_resultados' => $turma->consolidacao_resultados,
                'data_cancelamento' => $turma->data_cancelamento,
                'motivo_cancelamento' => $turma->motivo_cancelamento,
                'frequencia_media' => $turma->frequencia_media,
                'aprovacao_pct' => $turma->aprovacao_pct,
                'reprovacao_pct' => $turma->reprovacao_pct,
                'pendencia_pct' => $turma->pendencia_pct,
                'alunos_fflch_pct' => $turma->alunos_fflch_pct,
                'alunos_externos_pct' => $turma->alunos_externos_pct,
                'codigo_area' => $turma->codigo_area,
                'codigo_convenio' => $turma->codigo_convenio,
                'nivel_convenio' => $turma->nivel_convenio,
                'lingua_turma' => $turma->lingua_turma,
                'formato_oferecimento' => $turma->formato_oferecimento,
            ];
        });
    }
}
