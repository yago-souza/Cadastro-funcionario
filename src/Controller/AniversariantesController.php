<?php

namespace Spaal\RH\Controller;

class AniversariantesController implements Controller
{
    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../view/aniversariantes.php';
    }
}