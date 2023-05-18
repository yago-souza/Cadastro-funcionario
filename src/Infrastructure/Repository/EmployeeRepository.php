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
        #$sqlQuery = 'SELECT * FROM Employees;';
        $sqlQuery = 'SELECT * FROM SPL_VW_EMPLOYEES';
        $statement = $this->connection->query($sqlQuery);

        return $this->hydrateEmployeesList($statement);
    }

    public function employeesForRegister(Employee $employee): bool | array
    {
        $sqlQuery = 'SELECT * FROM SPL_VW_EMPLOYEES WHERE EMP_NUM = ?';
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $employee->getRegistro());
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function employeesBirthAt(int $birthDate): array
    {
<<<<<<< HEAD
        #$sqlQuery = 'SELECT * FROM employees WHERE Data_nascimento = ?;';
        $sqlQuery = 'SELECT *
                            FROM SPL_VW_EMPLOYEES
                            WHERE EXTRACT (MONTH FROM DATA_NASCIMENTO) = ?
                            ORDER BY EXTRACT(DAY FROM DATA_NASCIMENTO)';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate);
        $stmt->execute();

         return $this->hydrateEmployeesList($stmt);
=======
        $sqlQuery = 'SELECT * FROM employees WHERE Data_nascimento = ?;';
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate->format('Y-m-d'));
        $stmt->execute();

        return $this->hydrateStudentList($stmt);
>>>>>>> 407b0560f2eb1addaaf84f7736ecda8787cef404
    }

    public function save(Employee $employee): bool
    {;
        if ($this->employeesForRegister($employee) === false) {
            return $this->insertEmployee($employee);
        } else {
            return $this->updateEmployee($employee);
        }
    }

    private function hydrateEmployeesList(\PDOStatement $statement): array
    {
        $employeeDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
        $employeeList = [];

        foreach ($employeeDataList as $employeeData) {
            #var_dump($employeeData);
            $dataDemissao = null;
            $dataAdmissao = null;
            $dataNascimento = null;
            if ($employeeData['DATA_DEMISSAO'] !== null) {
                $dataDemissao = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_DEMISSAO']);
            }
            if ($employeeData['DATA_CONTRATACAO'] !== null) {
                $dataAdmissao = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_CONTRATACAO']);
            }
            if ($employeeData['DATA_NASCIMENTO'] !== null) {
                $dataNascimento = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_NASCIMENTO']);
            }
            $employeeList[] = new Employee(
                $employeeData['EMP_NUM'],
                mb_convert_case($employeeData['NAME'], MB_CASE_TITLE, 'UTF-8'),
                $dataAdmissao,
                $dataDemissao,
                $dataNascimento,
                mb_convert_case($employeeData['DEPARTAMENTO'], MB_CASE_TITLE, 'UTF-8'),
                $employeeData['CEP'],
                mb_convert_case($employeeData['RUA'], MB_CASE_TITLE, 'UTF-8'),
                $employeeData['NUMERO_CASA'],
                mb_convert_case($employeeData['BAIRRO'], MB_CASE_TITLE, 'UTF-8'),
                mb_convert_encoding(mb_convert_case($employeeData['CIDADE'], MB_CASE_TITLE, 'UTF-8'), 'UTF-8')
            );
        }
        return $employeeList;
    }


    private function insertEmployee(Employee $employee): bool
    {
        $insertQuery = 'INSERT INTO S_TRAINEE (EMP_NUM,
                                               NOME,
                                               DATA_NASCIMENTO,
                                               CONTRATACAO,
                                               DEMISSAO,
                                               DEPARTAMENTO,
                                               CEP,
                                               RUA,
                                               NUMERO_CASA,
                                               BAIRRO,
                                               CIDADE,
                                               CPF
                                               )
                                                VALUES 
                                             ( :Registro,
                                               :Nome,
                                               :Data_Nascimento,
                                               :Data_Admissao,
                                               :Data_Demissao,
                                               :Departamento,
                                               :Cep,
                                               :Rua,
                                               :NumeroCasa,
                                               :Bairro,
                                               :Cidade,
                                               :Cpf
                                               )
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
            ':Cpf' => $employee->getCpf(),
        ]);

        return $success;
    }

    private function updateEmployee(Employee $employee): bool
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
                                               Cidade = :Cidade,
                                               CPF = :Cpf
                                               WHERE Registro = :Registro';;
        $statement = $this->connection->prepare($updateQuery);
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
            ':cpf' => $employee->getCpf(),
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