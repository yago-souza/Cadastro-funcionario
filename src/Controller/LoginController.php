<?php

namespace Spaal\RH\Controller;

class LoginController implements Controller
{
    public function processaRequisicao(): void
    {
        $user = filter_input(INPUT_POST, 'usuario');
        $password = filter_input(INPUT_POST, 'password');

        if ($user == 'manager' && $password == 'sp@@l270') {
            $_SESSION['logado'] = true;
            header('Location: /');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}