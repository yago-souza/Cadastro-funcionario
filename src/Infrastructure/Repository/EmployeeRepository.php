<?php

namespace Spaal\RH\Infrastructure\Repository;

use PDO;
use Spaal\RH\Domain\Model\Employee;

class EmployeeRepository implements \Spaal\RH\Domain\Repository\EmployeeRepository
{
    public function __construct(private PDO $connection)
    {
    }

    public function allEmployees(): array
    {
        $sqlQuery = 'SELECT * FROM Employees;';
        $statement = $this->connection->query($sqlQuery);

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
        $sqlQuery = 'SELECT * FROM employees WHERE Data_nascimento = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
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
            #var_dump($employeeData);
            $dataDemissao = null;
            if ($employeeData['Data_Demissao'] !== null) {
                $dataDemissao = \DateTime::createFromFormat('d/m/Y', $employeeData['Data_Demissao']);
            }
            $dataAdmissao = \DateTime::createFromFormat('d/m/Y', $employeeData['Data_Admissao']);
            $dataNascimento = \DateTime::createFromFormat('d/m/Y', $employeeData['Data_Nascimento']);

            #var_dump(new \DateTime());

            $employeeList[] = new Employee(
                $employeeData['Registro'],
                $employeeData['Nome'],
                $dataAdmissao,
                $dataDemissao,
                $dataNascimento,
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
                                               Data_Demissao,
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
                                               :Data_Demissao,
                                               :Data_Nascimento,
                                               :Departamento,
                                               :Cep,
                                               :Rua,
                                               :NumeroCasa,
                                               :Bairro,
                                               :Cidade
                                               );
                        ';
        $statement = $this->connection->prepare($insertQuery);

        $success = $statement->execute([
            ':Registro' => $employee->getRegistro(),
            ':Nome' => $employee->getNome(),
            ':Data_Admissao' => $employee->getDataAdmissao()->format('d/m/Y'),
            ':Data_Demissao' => $employee->getDataDemissao()->format('d/m/Y'),
            ':Data_Nascimento' => $employee->getDataNascimento()->format('d/m/Y'),
            ':Departamento' => $employee->getDepartamento(),
            ':Cep' => $employee->getCep(),
            ':Rua' => $employee->getRua(),
            ':NumeroCasa' => $employee->getNumeroCasa(),
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
                                               Data_Demissao = :Data_Demissao,
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
            ':Data_Demissao' => $employee->getDataDemissao(),
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