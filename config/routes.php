<?php

return [
    'GET|/' => \Spaal\RH\Controller\FormController::class,
    'POST|/' => \Spaal\RH\Controller\NewEmployeeController::class,
    'GET|/aniversariantes' => \Spaal\RH\Controller\AniversariantesController::class,
    'POST|/aniversariantes' => \Spaal\RH\Controller\AniversariantesController::class,
    'GET|/lista-funcionarios' => \Spaal\RH\Controller\EmployeeListController::class,
    'GET|/login' => \Spaal\RH\Controller\LoginFormController::class,
    'POST|/login' => \Spaal\RH\Controller\LoginController::class,
    'GET|/logout' => \Spaal\RH\Controller\LogoutController::class,
    'GET|/editar-funcionario' => \Spaal\RH\Controller\FormController::class,
    'POST|/editar-funcionario' => \Spaal\RH\Controller\EditarFuncionarioController::class,
];