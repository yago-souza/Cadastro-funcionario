<?php

namespace Spaal\RH\Domain\Model;

class Employee
{
    public function __construct(private string $registro,
                                private string $nome,
                                private string $cpf,
                                private ?\DateTime $dataAdmissao,
                                private ?\DateTime $dataDemissao,
                                private ?\DateTime $dataNascimento,
                                private string $departamento,
                                private string $cep,
                                private string $rua,
                                private string $numeroCasa,
                                private string $bairro,
                                private string $cidade)
    {
    }

    /**
     * @return string
     */
    public function getRegistro(): string
    {
        return $this->registro;
    }

    /**
     * @param string $registro
     */
    public function setRegistro(string $registro): void
    {
        $this->registro = $registro;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     */
    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return \DateTime
     */
    public function getDataAdmissao(): \DateTime
    {
        return $this->dataAdmissao;
    }

    /**
     * @param \DateTime $dataAdmissao
     */
    public function setDataAdmissao(\DateTime $dataAdmissao): void
    {
        $this->dataAdmissao = $dataAdmissao;
    }

    /**
     * @return \DateTime
     */
    public function getDataDemissao(): \DateTime
    {
        return $this->dataDemissao;
    }

    /**
     * @param \DateTime $dataDemissao
     */
    public function setDataDemissao(\DateTime $dataDemissao): void
    {
        $this->dataDemissao = $dataDemissao;
    }

    /**
     * @return \DateTime
     */
    public function getDataNascimento(): \DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTime $dataNascimento
     */
    public function setDataNascimento(\DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return string
     */
    public function getDepartamento(): string
    {
        return $this->departamento;
    }

    /**
     * @param string $departamento
     */
    public function setDepartamento(string $departamento): void
    {
        $this->departamento = $departamento;
    }

    /**
     * @return string
     */
    public function getCep(): string
    {
        return $this->cep;
    }

    /**
     * @param string $cep
     */
    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return string
     */
    public function getRua(): string
    {
        return $this->rua;
    }

    /**
     * @param string $rua
     */
    public function setRua(string $rua): void
    {
        $this->rua = $rua;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @param string $bairro
     */
    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string
     */
    public function getCidade(): string
    {
        return $this->cidade;
    }

    /**
     * @param string $cidade
     */
    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getNumeroCasa(): string
    {
        return $this->numeroCasa;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }


}