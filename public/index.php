<?php

declare(strict_types=1);

use Spaal\RH\Controller\Error404Controller;
use Spaal\RH\Controller\LoginController;
use Spaal\RH\Controller\LogoutController;
use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;
use Spaal\RH\Controller\NewEmployeeController;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$employeeRepository = new EmployeeRepository($pdo);

$routes = require_once __DIR__ . '/../config/routes.php';
#$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];
#var_dump($pathInfo);
session_start();
## Serve para renovar o ID do cookie e protejer contra sequestro de sessão
## Conferir documentação como fazer isso de forma mais confiavel
if (isset($_SESSION['logado'])) {
    $originalInfo = $_SESSION['logado'];
    unset($_SESSION['logado']);
    session_regenerate_id();
    $_SESSION['logado'] = $originalInfo;
}
## Dessa forma, a sessão anterior não terá mais a informação de autenticação
# e a nova sessão terá a informação que já havia sido salva.

$isLoginRoute = $pathInfo === '/login';
if(!array_key_exists('logado', $_SESSION) && !$isLoginRoute) {
    header('Location: /login');
    return;
}

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($employeeRepository);

} else {
    $controller = new Error404Controller();
}
$controller->processaRequisicao();


/*
if ($pathInfo == '/' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/form-cadastro.php';
} elseif ($pathInfo == '/' && $httpMethod == 'POST') {
    require_once __DIR__ . '/../src/Controller/NewEmployeeController.php';
    $controllerClass = new NewEmployeeController($employeeRepository);
    $controllerClass->processaRequisicao();
} elseif ($pathInfo == '/aniversariantes') {
    require_once __DIR__ . '/../view/aniversariantes.php';
} elseif ($pathInfo == '/lista-funcionarios' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/lista-funcionarios.php';
} elseif ($pathInfo == '/login' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/login-form.php';
} elseif ($pathInfo == '/login' && $httpMethod == 'POST') {
    $controller = new LoginController();
    return $controller->processaRequisicao();
} elseif ($pathInfo == '/logout' && $httpMethod == 'GET') {
    $controller = new LogoutController();
    return $controller->processaRequisicao();
} elseif ($pathInfo == '/editar-funcionario' && $httpMethod == 'GET') {
    $controller = new \Spaal\RH\Controller\FormController();
    return $controller->processaRequisicao($employeeRepository);
}  else {
    $controller = new Error404Controller();
    return $controller->processaRequisicao();
}
*/