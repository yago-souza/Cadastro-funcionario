<?php


use Spaal\RH\Domain\Model\Employee;
use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';
#$pdo = ConnectionCreator::createConnection();
#$repository = new \Spaal\RH\Infrastructure\Repository\EmployeeRepository($pdo);

/*$empregado = new Employee('teste',
    'teste',
    new DateTime('09/05/2023'),
    new DateTime('09/05/2023'),
    new DateTime('09/05/2023'),
    'teste',
    'teste',
    'teste',
'teste',
'teste',
'teste');*/

#var_dump($repository->employeesBirthAt(5));

var_dump(jdmonthname(1));