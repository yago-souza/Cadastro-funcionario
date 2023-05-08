<?php

namespace Spaal\RH\Infrastructure\Repository;

use Spaal\RH\Domain\Model\Employee;

class EmployeeRepository implements \Spaal\RH\Domain\Repository\EmployeeRepository
{
    public function __construct(private PDO $connection)
    {
    }

    public function allEmployees(): array
    {
        $sqlQuery = 'SELECT * FROM Employees;';
        $statement = $this->connection->prepare($sqlQuery);

        return $this->hydrateEmployeesList($statement);
    }

    public function employeesForRegister(Employee $employee): ?Employee
    {
        $sqlQuery = 'SELECT * FROM Employees WHERE Registro = ?;';
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $employee->getRegistro());

        return $statement->execute();
    }

    public function employeesBirthAt(\DateTimeInterface $birthDate): array
    {
        return "teste";
    }

    public function save(Employee $employee): bool
    {
        return $this->insertEmployee($employee);
    }

    private function hydrateEmployeesList(\PDOStatement $statement): array
    {
        $employeeDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $employeeList = [];

        foreach ($employeeDataList as $employeeData) {
            $employeeList[] = new Employee(
                $employeeData['Registro'],
                $employeeData['Nome'],
                $employeeData['Data_Admissao'],
                $employeeData['Data_Deissao'],
                $employeeData['Data_Nascimento'],
                $employeeData['Departamento'],
                $employeeData['Cep'],
                $employeeData['Rua'],
                $employeeData['NumeroCasa'],
                $employeeData['Bairro'],
                $employeeData['Cidade']
            );
        }
        return $employeeList;
    }


    private function insertEmployee(Employee $employee): bool
    {
        $insertQuery = 'INSERT INTO Employees (Registro,
                                               Nome,
                                               Data_Admissao,
                                               Data_Deissao,
                                               Data_Nascimento,
                                               Departamento,
                                               Cep,
                                               Rua,
                                               NumeroCasa,
                                               Bairro,
                                               Cidade
                                               )
                                                VALUES 
                                             ( :Registro,
                                               :Nome,
                                               :Data_Admissao,
                                               :Data_Deissao,
                                               :Data_Nascimento,
                                               :Departamento,
                                               :Cep,
                                               :Rua,
                                               :Bairro,
                                               :NumeroCasa,
                                               :Cidade
                                               );
                        ';
        $statement = $this->connection->prepare($insertQuery);

        $success = $statement->execute([
            ':Registro' => $employee->getRegistro(),
            ':Nome' => $employee->getNome(),
            ':Data_Admissao' => $employee->getDataAdmissao(),
            ':Data_Deissao' => $employee->getDataDemissao(),
            ':Data_Nascimento' => $employee->getDataNascimento(),
            ':Departamento' => $employee->getDepartamento(),
            ':Cep' => $employee->getCep(),
            ':Rua' => $employee->getRua(),
            ':Numero' => $employee->getNumeroCasa(),
            ':Bairro' => $employee->getBairro(),
            ':Cidade' => $employee->getCidade(),
        ]);

        return $success;
    }

    private function updateEmployee(Employee $employee)
    {
        $updateQuery = 'UPDATE Employees SET Registro = :Registro,
                                               Nome = :Nome,
                                               Data_Admissao = :Data_Admissao,
                                               Data_Deissao = :Data_Deissao,
                                               Data_Nascimento = :Data_Nascimento,
                                               Departamento = :Departamento,
                                               Cep = :Cep,
                                               Rua = :Rua,
                                               NumeroCasa = :NumeroCasa,
                                               Bairro = :Bairro,
                                               Cidade = :Cidade
                                               WHERE Registro = :Registro';;
        $statement = $this->connection->prepare($updateQuery);
        $success = $statement->execute([
            ':Registro' => $employee->getRegistro(),
            ':Nome' => $employee->getNome(),
            ':Data_Admissao' => $employee->getDataAdmissao(),
            ':Data_Deissao' => $employee->getDataDemissao(),
            ':Data_Nascimento' => $employee->getDataNascimento(),
            ':Departamento' => $employee->getDepartamento(),
            ':Cep' => $employee->getCep(),
            ':Rua' => $employee->getRua(),
            ':NumeroCasa' => $employee->getNumeroCasa(),
            ':Cidade' => $employee->getCidade(),
            ':Bairro' => $employee->getBairro(),
        ]);

        return $success;
    }

    public function remove(Employee $employee): bool
    {
        $statement = $this->connection->prepare('DElETE FROM Employees WHERE Registro = ?;');
        $statement->bindValue(1, $employee->getRegistro());

        return $statement->execute();
    }
}