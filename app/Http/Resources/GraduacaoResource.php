<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GraduacaoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_graduacao' => $this->id_graduacao,
            'aluno' => $this->mapAluno(),
            'sequencia_grad' => $this->sequencia_grad,
            'situacao_curso' => $this->situacao_curso,
            'data_inicio_vinculo' => $this->data_inicio_vinculo,
            'data_fim_vinculo' => $this->data_fim_vinculo,
            'codigo_curso' => $this->codigo_curso,
            'nome_curso' => $this->nome_curso,
            'habilitacoes' => $this->mapHabilitacoes(),
            'tipo_ingresso' => $this->tipo_ingresso,
            'categoria_ingresso' => $this->categoria_ingresso,
            'rank_ingresso' => $this->rank_ingresso,
            'notas_ingresso' => $this->mapNotasIngresso(),
            'bacharelado' => $this->bacharelado,
            'tipo_encerramento_bacharelado' => $this->tipo_encerramento_bacharelado,
            'data_encerramento_bacharelado' => $this->data_encerramento_bacharelado,
            'licenciatura' => $this->licenciatura,
            'tipo_encerramento_licenciatura' => $this->tipo_encerramento_licenciatura,
            'data_encerramento_licenciatura' => $this->data_encerramento_licenciatura,
            'trancamentos' => $this->mapTrancamentos(),
        ];
    }

    private function mapAluno()
    {
        $aluno = $this->aluno;

        return [
            'numero_usp' => $aluno->numero_usp,
            "nome" => $aluno->nome,
            "data_nascimento" => $aluno->data_nascimento,
            "data_falecimento" => $aluno->data_falecimento,
            "email" => $aluno->email,
            "nacionalidade" => $aluno->nacionalidade,
            "cidade_nascimento" => $aluno->cidade_nascimento,
            "estado_nascimento" => $aluno->estado_nascimento,
            "pais_nascimento" => $aluno->pais_nascimento,
            "raca" => $aluno->raca,
            "sexo" => $aluno->sexo,
            "orientacao_sexual" => $aluno->orientacao_sexual,
            "identidade_genero" => $aluno->identidade_genero,
            "situacao_vacinal_covid" => $aluno->situacao_vacinal_covid,
            "cpf" => $aluno->cpf,
        ];
    }

    private function mapHabilitacoes()
    {
        return $this->habilitacoes->map(function ($habilitacao) {
            return [
                'codigo_habilitacao' => $habilitacao->codigo_habilitacao,
                'nome_habilitacao' => $habilitacao->nome_habilitacao,
                'tipo_habilitacao' => $habilitacao->tipo_habilitacao,
                'periodo_habilitacao' => $habilitacao->periodo_habilitacao,
                'data_inicio_habilitacao' => $habilitacao->data_inicio_habilitacao,
                'data_fim_habilitacao' => $habilitacao->data_fim_habilitacao,
                'tipo_encerramento' => $habilitacao->tipo_encerramento,
                'data_colacao_grau' => $habilitacao->data_colacao_grau,
                'data_expedicao_diploma' => $habilitacao->data_expedicao_diploma,
            ];
        });
    }

    private function mapNotasIngresso()
    {
        return $this->notasIngresso->map(function ($nota) {
            return [
                'codigo_prova' => $nota->codigo_prova,
                'descricao_prova' => $nota->descricao_prova,
                'pontos_obtidos' => $nota->pontos_obtidos,
                'pontos_maximo' => $nota->pontos_maximo,
            ];
        });
    }

    private function mapTrancamentos()
    {
        return $this->trancamentos->map(function ($trancamento) {
            return [
                'data_registro_inicio_tranc' => $trancamento->data_registro_inicio_tranc,
                'periodo_inicio_trancamento' => $trancamento->periodo_inicio_trancamento,
                'data_registro_fim_tranc' => $trancamento->data_registro_fim_tranc,
                'periodo_fim_trancamento' => $trancamento->periodo_fim_trancamento,
                'semestres_trancados' => $trancamento->semestres_trancados,
                'sequencia_trancamento' => $trancamento->sequencia_trancamento,
            ];
        });
    }
}
