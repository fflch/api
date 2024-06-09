<?php

namespace App\Http\Resources\PosGraduacao;

use Illuminate\Http\Resources\Json\JsonResource;

class PosGraduacaoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id_posgraduacao' => $this->id_posgraduacao,
            'seq_programa' => $this->seq_programa,
            'tipo_matricula' => $this->tipo_matricula,
            'nivel_programa' => $this->nivel_programa,
            'aluno' => $this->mapAluno(),
            'codigo_area' => $this->codigo_area,
            'nome_area' => $this->nome_area,
            'codigo_programa' => $this->codigo_programa,
            'nome_programa' => $this->nome_programa,
            'data_selecao' => $this->data_selecao,
            'primeira_matricula' => $this->primeira_matricula,
            'tipo_ultima_ocorrencia' => $this->tipo_ultima_ocorrencia,
            'data_ultima_ocorrencia' => $this->data_ultima_ocorrencia,
            'data_deposito_trabalho' => $this->data_deposito_trabalho,
            'data_aprovacao_trabalho' => $this->data_aprovacao_trabalho,
            'orientacoes' => $this->mapOrientacoes(),
            'convenios' => $this->mapConvenios(),
            'exames_proficiencia' => $this->mapProficiencias(),
            'bolsas' => $this->mapBolsas(),
            'ocorrencias' => $this->mapOcorrencias(),
            'defesa' => $this->mapDefesa(),
        ];
    }

    private function mapAluno()
    {
        $aluno = $this->aluno;

        return [
            'numero_usp' => $aluno->numero_usp,
            'nome' => $aluno->nome,
            'data_nascimento' => $aluno->data_nascimento,
            'data_falecimento' => $aluno->data_falecimento,
            'email' => $aluno->email,
            'nacionalidade' => $aluno->nacionalidade,
            'cidade_nascimento' => $aluno->cidade_nascimento,
            'estado_nascimento' => $aluno->estado_nascimento,
            'pais_nascimento' => $aluno->pais_nascimento,
            'raca' => $aluno->raca,
            'sexo' => $aluno->sexo,
            'orientacao_sexual' => $aluno->orientacao_sexual,
            'identidade_genero' => $aluno->identidade_genero,
            'situacao_vacinal_covid' => $aluno->situacao_vacinal_covid,
            'cpf' => $aluno->cpf,
        ];
    }

    private function mapOrientacoes()
    {
        return $this->orientacoes->map(function ($orientacao) {
            return [
                'sequencia_orientacao' => $orientacao->sequencia_orientacao,
                'orientador' => $this->mapOrientador($orientacao->orientador),
                'tipo_orientacao' => $orientacao->tipo_orientacao,
                'data_inicio_orientacao' => $orientacao->data_inicio_orientacao,
                'data_fim_orientacao' => $orientacao->data_fim_orientacao,
                'ultimo_orientador' => $orientacao->ultimo_orientador,
                'orientacao_especifica' => $orientacao->orientacao_especifica,
                'data_conversao_para_plena' => $orientacao->data_conversao_para_plena,
                'data_conversao_para_especifica' => $orientacao->data_conversao_para_especifica,
            ];
        })->toArray();
    }

    private function mapOrientador($orientador)
    {
        return [
            'numero_usp' => $orientador->numero_usp,
            'nome' => $orientador->nome,
            'data_nascimento' => $orientador->data_nascimento,
            'data_falecimento' => $orientador->data_falecimento,
            'email' => $orientador->email,
            'nacionalidade' => $orientador->nacionalidade,
            'cidade_nascimento' => $orientador->cidade_nascimento,
            'estado_nascimento' => $orientador->estado_nascimento,
            'pais_nascimento' => $orientador->pais_nascimento,
            'raca' => $orientador->raca,
            'sexo' => $orientador->sexo,
            'orientacao_sexual' => $orientador->orientacao_sexual,
            'identidade_genero' => $orientador->identidade_genero,
            'situacao_vacinal_covid' => $orientador->situacao_vacinal_covid,
            'cpf' => $orientador->cpf,
        ];
    }

    private function mapConvenios()
    {
        return $this->convenios->map(function ($convenio) {
            return [
                'codigo_convenio' => $convenio->codigo_convenio,
                'sigla_convenio' => $convenio->sigla_convenio,
                'nome_convenio' => $convenio->nome_convenio,
            ];
        })->toArray();
    }

    private function mapBolsas()
    {
        return $this->bolsas->map(function ($bolsa) {
            return [
                'id_bolsa' => $bolsa->id_bolsa,
                'situacao_bolsa' => $bolsa->situacao_bolsa,
                'data_inicio_bolsa' => $bolsa->data_inicio_bolsa,
                'data_fim_bolsa' => $bolsa->data_fim_bolsa,
                'codigo_instituicao_fomento' => $bolsa->codigo_instituicao_fomento,
                'sigla_instituicao_fomento' => $bolsa->sigla_instituicao_fomento,
                'nome_instituicao_fomento' => $bolsa->nome_instituicao_fomento,
                'codigo_programa_fomento' => $bolsa->codigo_programa_fomento,
                'nome_programa_fomento' => $bolsa->nome_programa_fomento,
            ];
        })->toArray();
    }

    private function mapOcorrencias()
    {
        return $this->ocorrencias->map(function ($ocorrencia) {
            return [
                'data_ocorrencia' => $ocorrencia->data_ocorrencia,
                'tipo_ocorrencia' => $ocorrencia->tipo_ocorrencia,
                'motivo_ocorrencia' => $ocorrencia->motivo_ocorrencia,
                'prazo_afastamento' => $ocorrencia->prazo_afastamento,
                'codigo_area_destino' => $ocorrencia->codigo_area_destino,
                'nome_area_destino' => $ocorrencia->nome_area_destino,
                'nivel_programa_destino' => $ocorrencia->nivel_programa_destino,
                'prorrogacao_def_solicitada_dias' => $ocorrencia->prorrogacao_def_solicitada_dias,
                'prorrogacao_def_obtida_dias' => $ocorrencia->prorrogacao_def_obtida_dias,
            ];
        })->toArray();
    }

    private function mapProficiencias()
    {
        return $this->proficiencias->map(function ($proficiencia) {
            return [
                'data_exame' => $proficiencia->data_exame,
                'idioma' => $proficiencia->idioma,
            ];
        })->toArray();
    }

    private function mapDefesa()
    {
        if (!isset($this->defesa)) return null;

        return [
            'id_defesa' => $this->defesa->id_defesa,
            'data_defesa' => $this->defesa->data_defesa,
            'local_defesa' => $this->defesa->local_defesa,
            'mencao_honrosa' => $this->defesa->mencao_honrosa,
            'titulo_trabalho' => $this->defesa->titulo_trabalho,
        ];
    }
}
