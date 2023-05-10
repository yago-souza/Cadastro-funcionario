<?php

namespace Spaal\RH\Controller;

class EmployeeListController implements Controller
{
    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../view/lista-funcionarios.php';
    }
}