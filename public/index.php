<?php

use Spaal\RH\Domain\Infrastructure\Persistence\ConnectionCreator;
use Spaal\RH\Domain\Controller\NewEmployeeController;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

require_once __DIR__ . '/../vendor/autoload.php';
$databasePath =__DIR__ . '/../../../banco';
$pdo = new \PDO('sqlite:' . $databasePath);#ConnectionCreator::createConnection();
$employeeRepository = new EmployeeRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

if ($pathInfo == '/' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/form-cadastro.php';
} elseif ($pathInfo == '/' && $httpMethod == 'POST') {
    require_once __DIR__ . '/../src/Controller/NewEmployeeController.php';
    $controllerClass = new NewEmployeeController($employeeRepository);
    $controllerClass->processaRequisicao();
    #header('Location: /');
    #var_dump($httpMethod);
    #var_dump($_POST);

} else {
    $controller = new Error404Controller();
}