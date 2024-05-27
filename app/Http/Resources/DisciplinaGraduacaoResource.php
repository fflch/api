<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DisciplinaGraduacaoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'codigo_disciplina' => $this->codigo_disciplina,
            'versao_disciplina' => $this->versao_disciplina,
            'nome_disciplina' => $this->nome_disciplina,
            'situacao_disciplina' => $this->situacao_disciplina,
            'data_ativacao_disciplina' => $this->data_ativacao_disciplina,
            'data_desativacao_disciplina' => $this->data_desativacao_disciplina,
            'credito_aula' => $this->credito_aula,
            'credito_trabalho' => $this->credito_trabalho,
            'duracao_disciplina_semanas' => $this->duracao_disciplina_semanas,
            'periodicidade_disciplina' => $this->periodicidade_disciplina,
            'carga_horaria_estagio' => $this->carga_horaria_estagio,
            'carga_horaria_licenciatura' => $this->carga_horaria_licenciatura,
            'carga_horaria_aacc' => $this->carga_horaria_aacc,
            'turmas' => $this->mapTurmas(),
        ];
    }

    private function mapTurmas()
    {
        // dd($this->turmas);
        return $this->turmas->map(function ($turma) {
            return [
                'id_turma' => $turma->id_turma,
                'codigo_disciplina' => $turma->codigo_disciplina,
                'versao_disciplina' => $turma->versao_disciplina,
                'codigo_turma' => $turma->codigo_turma,
                'tipo_turma' => $turma->tipo_turma,
                'data_criacao_turma' => $turma->data_criacao_turma,
                'situacao_turma' => $turma->situacao_turma,
                'data_inicio_turma' => $turma->data_inicio_turma,
                'data_fim_turma' => $turma->data_fim_turma,
                'carga_horaria_teorica' => $turma->carga_horaria_teorica,
                'carga_horaria_pratica' => $turma->carga_horaria_pratica,
                'numero_alunos_inicial' => $turma->numero_alunos_inicial,
                'trancamentos_pct' => $turma->trancamentos_pct,
                'numero_alunos_final' => $turma->numero_alunos_final,
                'pendencia_pct' => $turma->pendencia_pct,
                'recuperacao_pct' => $turma->recuperacao_pct,
                'aprovacao_pct' => $turma->aprovacao_pct,
                'reprov_nota_pct' => $turma->reprov_nota_pct,
                'reprov_freq_pct' => $turma->reprov_freq_pct,
                'reprov_ambos_pct' => $turma->reprov_ambos_pct,
                'frequencia_media' => $turma->frequencia_media,
                'nota_media' => $turma->nota_media,
            ];
        });
    }
}
