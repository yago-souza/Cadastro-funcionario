<?php


use Spaal\RH\Domain\Model\Employee;
use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';
$pdo = ConnectionCreator::createConnection();
$repository = new \Spaal\RH\Infrastructure\Repository\EmployeeRepository($pdo);

var_dump($repository->allEmployees());

/*
$empregado = new Employee('123',
    'Yago',
    '09/05/2023',
    '09/05/2023',
    '09/05/2023',
    'TI',
    '06123456',
    'Rua teste',
'teste',
'teste',
'teste');
*/