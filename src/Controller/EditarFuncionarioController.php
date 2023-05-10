<?php

namespace Spaal\RH\Controller;

use Spaal\RH\Domain\Model\Employee;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

class EditarFuncionarioController implements Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $registro = filter_input(INPUT_GET, 'registro');
        if ($registro === false || $registro === null){
            header('Location: /?sucesso=0');
            exit();
        }

        $nome = mb_convert_case(filter_input(INPUT_POST, 'nome'), MB_CASE_TITLE, 'UTF-8');
        $CPF = filter_input(INPUT_POST, 'CPF');
        $admissao = new \DateTime(filter_input(INPUT_POST, 'data-admissao'));
        $demissao = new \DateTime(filter_input(INPUT_POST, 'data-demissao'));
        $nascimento = new \DateTime(filter_input(INPUT_POST, 'data-nascimento'));
        $departamento = mb_convert_case(filter_input(INPUT_POST, 'departamento'), MB_CASE_TITLE, 'UTF-8');
        $Cep = mb_convert_case(filter_input(INPUT_POST, 'Cep'), MB_CASE_TITLE, 'UTF-8');
        $Rua = mb_convert_case(filter_input(INPUT_POST, 'Rua'), MB_CASE_TITLE, 'UTF-8');
        $numeroCasa = mb_convert_case(filter_input(INPUT_POST, 'Numero'), MB_CASE_TITLE, 'UTF-8');
        $bairro = mb_convert_case(filter_input(INPUT_POST, 'Bairro'), MB_CASE_TITLE, 'UTF-8');
        $cidade = mb_convert_case(filter_input(INPUT_POST, 'Cidade'), MB_CASE_TITLE, 'UTF-8');

        #$employeeStmt = $this->employeeRepository->employeesForRegister($registro);

        $employee = new Employee(
            $registro,
            $nome,
            $CPF,
            $admissao,
            $demissao,
            $nascimento,
            $departamento,
            $Cep,
            $Rua,
            $numeroCasa,
            $bairro,
            $cidade
        );

        if ($this->employeeRepository->save($employee)) {
            header('Location: /?sucesso=1');
        }


    }
}