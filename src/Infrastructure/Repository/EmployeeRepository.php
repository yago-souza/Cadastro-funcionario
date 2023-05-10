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

    public function employeesForRegister(string $registro/*Employee $employee*/): bool | array
    {
        $sqlQuery = 'SELECT * FROM SPL_VW_EMPLOYEES WHERE EMP_NUM = ?';
        $statement = $this->connection->prepare($sqlQuery);
        $statement->bindValue(1, $registro/*$employee->getRegistro()*/);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function employeeInD_empl(string $registro): bool | array
    {
        $sqlQuery = 'SELECT
                               A.EMP_NUM AS EMP_NUM,
                               A.NAME AS NOME,
                               B.DATA_NASCIMENTO AS DATA_NASCIMENTO,
                               C.DATA_ORACLE AS DATA_CONTRATACAO,
                               D.DATA_ORACLE AS DATA_DEMISSAO,
                               E.DESCRIPTION AS DEPARTAMENTO,
                               B.EMPL_CEP AS CEP,
                               B.EMPL_ADDR1 AS RUA,
                               B.EMPL_ADDR2 AS NUMERO_CASA,
                               B.EMPL_ADDR3 AS BAIRRO,
                               B.EMPL_CITY AS CIDADE
                
                               FROM EMPLOYEE A
                               INNER JOIN D_EMPL B ON (A.CCN = B.CCN AND A.EMP_NUM = B.EMP_NUM)
                               LEFT JOIN D_DTGLOR C ON (B.D_EMPL_STRT_DATE = C.DATA_GLOVIA)
                               LEFT JOIN D_DTGLOR D ON (B.D_EMPL_END_DATE = D.DATA_GLOVIA)
                               LEFT JOIN CC E ON (A.CCN = E.CCN AND A.CC = E.CC)
                               WHERE A.EMP_NUM = ?';
        $statement2 = $this->connection->prepare($sqlQuery);
        $statement2->bindValue(1, $registro);
        $statement2->execute();

        return $statement2->fetch(PDO::FETCH_ASSOC);
    }

    public function employeesBirthAt(int $birthDate): array
    {
        #$sqlQuery = 'SELECT * FROM employees WHERE Data_nascimento = ?;';
        $sqlQuery = "SELECT *
                            FROM SPL_VW_EMPLOYEES
                            WHERE EXTRACT (MONTH FROM DATA_NASCIMENTO) = ?
                            AND EMP_NUM NOT IN ('3270','3292','3217','3451','3612')
                            ORDER BY EXTRACT(DAY FROM DATA_NASCIMENTO)";
        $stmt = $this->connection->prepare($sqlQuery);
        $stmt->bindValue(1, $birthDate);
        $stmt->execute();

         return $this->hydrateEmployeesList($stmt);
    }

    public function save(Employee $employee): bool
    {

        # se o empregado não existir na tabela S_TRAINEE
        # consultar na query abaixo
        #$this->employeeInD_empl($employee->getRegistro()) === false
        if ($this->employeeInD_empl($employee->getRegistro()) !== false) {
            header("/?sucesso=0");
            exit();
            # se o empregado não existir na query a cima
            # inserir empregado na S_TRAINEE
            #return $this->insertEmployee($employee);
        } elseif ($this->employeesForRegister($employee->getRegistro()) === false) {
            return $this->insertEmployee($employee);
        } else {
            return $this->updateEmployee($employee);
        }
            /*
            if ($this->employeesForRegister($employee->getRegistro()) === false) {
                return $this->insertEmployee($employee);
            } else {
                return $this->updateEmployee($employee);
            }*/

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
            $departamento = "DEPARTAMENTO NÃO LISTADO";
            if ($employeeData['DATA_DEMISSAO'] !== null) {
                $dataDemissao = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_DEMISSAO']);
            }
            if ($employeeData['DATA_CONTRATACAO'] !== null) {
                $dataAdmissao = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_CONTRATACAO']);
            }
            if ($employeeData['DATA_NASCIMENTO'] !== null) {
                $dataNascimento = \DateTime::createFromFormat('d/m/Y', $employeeData['DATA_NASCIMENTO']);
            }
            if ($employeeData['DEPARTAMENTO'] !== null) {
                $departamento = mb_convert_case($employeeData['DEPARTAMENTO'], MB_CASE_TITLE, 'UTF-8');
            }
            $employeeList[] = new Employee(
                $employeeData['EMP_NUM'],
                mb_convert_case($employeeData['NOME'], MB_CASE_TITLE, 'UTF-8'),
                null,
                $dataAdmissao,
                $dataDemissao,
                $dataNascimento,
                $departamento,
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
            ':Data_Demissao' => null,
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
        $updateQuery = 'UPDATE S_TRAINEE SET EMP_NUM = :Registro,
                                               Nome = :Nome,
                                               CONTRATACAO = :Data_Admissao,
                                               DEMISSAO = :Data_Demissao,
                                               Data_Nascimento = :Data_Nascimento,
                                               Departamento = :Departamento,
                                               Cep = :Cep,
                                               Rua = :Rua,
                                               Numero_Casa = :NumeroCasa,
                                               Bairro = :Bairro,
                                               Cidade = :Cidade,
                                               CPF = :Cpf
                                               WHERE EMP_NUM = :Registro';;
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