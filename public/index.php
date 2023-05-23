<?php

use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;
use Spaal\RH\Controller\NewEmployeeController;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

require_once __DIR__ . '/../vendor/autoload.php';
$pdo = ConnectionCreator::createConnection();
$employeeRepository = new EmployeeRepository($pdo);

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

if ($pathInfo == '/' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/form-cadastro.php';
} elseif ($pathInfo == '/' && $httpMethod == 'POST') {
    require_once __DIR__ . '/../src/Controller/NewEmployeeController.php';
    $controllerClass = new NewEmployeeController($employeeRepository);
    $controllerClass->processaRequisicao();
<<<<<<< HEAD
} elseif ($pathInfo == '/aniversariantes') {
    echo "teste";
    exit(b);
    #require_once __DIR__ . '/../view/aniversariantes-old.php';
} elseif ($pathInfo == '/lista-funcionarios') {
    echo "teste";
    exit();
    require_once __DIR__ . 'lista-funcionarios.php';
} elseif ($pathInfo == '/login') {

    require_once __DIR__ . 'login-form.php';
}  else {
=======
    #header('Location: /');
    #var_dump($pathInfo);
    #var_dump($httpMethod);
    #var_dump($_POST);
} elseif ($pathInfo == '/aniversariantes') {
    echo "teste";
    exit();
<<<<<<< HEAD
    #require_once __DIR__ . '/../view/aniversariantes-old.php';
} elseif ($pathInfo == '/lista-funcionarios') {
    require_once __DIR__ . 'lista-funcionarios.php';
}  else {
=======
    require_once __DIR__ . '/../view/aniversariantes-old.php';
} else {
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
>>>>>>> 57e33f36ba4be2fcc3e4949fd464bfc791b199e5
    $controller = new Error404Controller();
}