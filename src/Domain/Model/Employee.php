<?php

namespace Spaal\RH\Domain\Model;

class Employee
{
    public function __construct(private string $registro,
                                private string $nome,
                                private \DateTimeInterface $dataAdmissao,
                                private \DateTimeInterface $dataDemissao,
                                private \DateTimeInterface $dataNascimento,
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
     * @return \DateTimeInterface
     */
    public function getDataAdmissao(): \DateTimeInterface
    {
        return $this->dataAdmissao;
    }

    /**
     * @param \DateTimeInterface $dataAdmissao
     */
    public function setDataAdmissao(\DateTimeInterface $dataAdmissao): void
    {
        $this->dataAdmissao = $dataAdmissao;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDataDemissao(): \DateTimeInterface
    {
        return $this->dataDemissao;
    }

    /**
     * @param \DateTimeInterface $dataDemissao
     */
    public function setDataDemissao(\DateTimeInterface $dataDemissao): void
    {
        $this->dataDemissao = $dataDemissao;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDataNascimento(): \DateTimeInterface
    {
        return $this->dataNascimento;
    }

    /**
     * @param \DateTimeInterface $dataNascimento
     */
    public function setDataNascimento(\DateTimeInterface $dataNascimento): void
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


}