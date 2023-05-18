<?php

namespace Spaal\RH\Controller;

use Spaal\RH\Domain\Model\Employee;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

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
        #$data = new \DateTime(filter_input(INPUT_POST, 'data-admissao'));
        #var_dump($data->format('d/m/Y'));
        $employee = new Employee(
            filter_input(INPUT_POST, 'registro'),
            mb_convert_case(filter_input(INPUT_POST, 'nome'), MB_CASE_TITLE, 'UTF-8'),
            trim(filter_input(INPUT_POST, 'CPF')),
            new \DateTime(filter_input(INPUT_POST, 'data-admissao')),
            new \DateTime(filter_input(INPUT_POST, 'data-demissao')),
            new \DateTime(filter_input(INPUT_POST, 'data-nascimento')),
            mb_convert_case(filter_input(INPUT_POST, 'departamento'), MB_CASE_TITLE, 'UTF-8'),
            filter_input(INPUT_POST, 'Cep'),
            mb_convert_case(filter_input(INPUT_POST, 'Rua'), MB_CASE_TITLE, 'UTF-8'),
            mb_convert_case(filter_input(INPUT_POST, 'Numero'), MB_CASE_TITLE, 'UTF-8'),
            mb_convert_case(filter_input(INPUT_POST, 'Bairro'), MB_CASE_TITLE, 'UTF-8'),
            mb_convert_case(filter_input(INPUT_POST, 'Cidade'), MB_CASE_TITLE, 'UTF-8')
        );
        if ($this->employeeRepository->save($employee) === false) {
            header("Location: http://192.100.100.245/api/RH/public/?sucesso=0");
            exit();
        } else {
            header("Location: http://192.100.100.245/api/RH/public/?sucesso=1");
            exit();
        }
    }
}