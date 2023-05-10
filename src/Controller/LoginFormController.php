<?php

namespace Spaal\RH\Controller;

class LoginFormController implements Controller
{
    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../view/login-form.php';
    }
}