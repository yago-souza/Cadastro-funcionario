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
            filter_input(INPUT_POST, 'nome'),
            new \DateTime(filter_input(INPUT_POST, 'data-admissao')),
            new \DateTime(filter_input(INPUT_POST, 'data-demissao')),
            new \DateTime(filter_input(INPUT_POST, 'data-nascimento')),
            filter_input(INPUT_POST, 'departamento'),
            filter_input(INPUT_POST, 'Cep'),
            filter_input(INPUT_POST, 'Rua'),
            filter_input(INPUT_POST, 'Numero'),
            filter_input(INPUT_POST, 'Bairro'),
            filter_input(INPUT_POST, 'Cidade')
        );
        if ($this->employeeRepository->save($employee) === false) {
            header("Location: /?sucesso=0");
        } else {
            header("Location: /?sucesso=1");
        }
    }
}