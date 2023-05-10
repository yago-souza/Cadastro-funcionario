<?php

namespace Spaal\RH\Controller;

use Spaal\RH\Domain\Model\Employee;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

class FormController implements Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $registro = filter_input(INPUT_GET, 'registro');
        $nome = null;
        $cpf = null;
        #$dataAdmissao = new \DateTime();
        $dataAdmissao = null;#$dataAdmissao->format('Y-m-d');
        #$dataDemissao = new \DateTime();
        $dataDemissao = null;#$dataDemissao->format('Y-m-d');
        #$dataNascimento = new \DateTime();
        $dataNascimento = null;#$dataNascimento->format('Y-m-d');
        $departamento = null;
        $cep = null;
        $rua = null;
        $numeroCasa = null;
        $bairro = null;
        $cidade = null;
        if ($registro !== false && $registro !== null) {
            $employee = $this->employeeRepository->employeesForRegister($registro);
            $registro = $employee['EMP_NUM'];
            $nome = $employee['NOME'];
            $dataAdmissao = \DateTime::createFromFormat('d/m/y', $employee['DATA_CONTRATACAO']);
            $dataAdmissao = $dataAdmissao->format('Y-m-d');
            if ($employee['DATA_DEMISSAO'] !== null) {
                $dataDemissao = \DateTime::createFromFormat('d/m/y',$employee['DATA_DEMISSAO']);
                $dataDemissao = $dataDemissao->format('Y-m-d');
            }
            $dataNascimento = \DateTime::createFromFormat('d/m/y',$employee['DATA_NASCIMENTO']);
            $dataNascimento = $dataNascimento->format('Y-m-d');
            $departamento = $employee['DEPARTAMENTO'];
            $cep = $employee['CEP'];
            $rua = $employee['RUA'];
            $numeroCasa = $employee['NUMERO_CASA'];
            $bairro = $employee['BAIRRO'];
            $cidade = $employee['CIDADE'];
            if ($this->employeeRepository->employeeInD_empl($registro) !== false) {
                header('Location: /?sucesso=3');
                exit();
            }
        }

        require_once __DIR__ . '/../../view/form-cadastro.php';
    }
}