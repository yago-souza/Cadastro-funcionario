<?php

namespace Spaal\RH\Domain\Controller;

use Spaal\RH\Domain\Infrastructure\Repository\EmployeeRepository;
use Spaal\RH\Domain\Model\Employee;

class NewEmployeeController implements Controller
{
    public function __construct(private EmployeeRepository $employeeRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $url = filter_input(INPUT_POST, 'url', FILTER_VALIDATE_URL);
        if ($url === false) {
            header('Location: /?sucesso=0');
            exit();
        }
        $employee = new Employee(
            filter_input(INPUT_POST, 'registro'),
            filter_input(INPUT_POST, 'nome'),
            filter_input(INPUT_POST, 'dataAdmissao'),
            filter_input(INPUT_POST, 'dataDemissao'),
            filter_input(INPUT_POST, 'dataNascimento'),
            filter_input(INPUT_POST, 'departamento'),
            filter_input(INPUT_POST, 'cep'),
            filter_input(INPUT_POST, 'rua'),
            filter_input(INPUT_POST, 'numeroCasa'),
            filter_input(INPUT_POST, 'bairro'),
            filter_input(INPUT_POST, 'cidade')
        );
        if ($this->employeeRepository->save($employee) === false) {
            header("Location: /?sucesso=0");
        } else {
            header("Location: /?sucesso=1");
        }
    }
}