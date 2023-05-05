<?php

require_once __DIR__ . '/../vendor/autoload.php';

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

if ($pathInfo == '/' && $httpMethod == 'GET') {
    require_once __DIR__ . '/../view/form-cadastro.php';
} elseif ($pathInfo == '/' && $httpMethod == 'POST') {
    #header('Location: /');
    var_dump($httpMethod);
    var_dump($_POST);

}