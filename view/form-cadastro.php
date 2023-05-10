<?php

use Spaal\RH\Domain\Model\Employee;

if (array_key_exists('sucesso', $_GET)) {
    if ($_GET['sucesso'] == '1') {
        echo '<script>alert("Inserido com sucesso!");</script>';
    } elseif ($_GET['sucesso'] == '0') {
        echo '<script>alert("Erro!");</script>';
    } elseif ($_GET['sucesso'] == '3') {
        echo '<script>alert("Editar funcionario pelo GLOVIA");</script>';
    }
}

/** @var \Spaal\RH\Domain\Model\Employee\null  $employee */
/*if ($employee !== null) {
    $contratacao = null;
    $demicao = null;
    $nascimento = null;
    $formato = 'd/m/y';
    if ($employee['DATA_CONTRATACAO'] !== null) {
        $contratacao = DateTime::createFromFormat($formato,$employee['DATA_CONTRATACAO']);
    }
    if ($employee['DATA_DEMISSAO'] !== null) {
        $demicao = DateTime::createFromFormat($formato,$employee['DATA_DEMISSAO']);
    }
    if ($employee['DATA_NASCIMENTO'] !== null) {
        $nascimento = DateTime::createFromFormat($formato,$employee['DATA_NASCIMENTO']);
    }

    $employee = new Employee(
        $employee['EMP_NUM'],
        $employee['NOME'],
        $employee['EMP_NUM'],
        $contratacao,
        $demicao,
        $nascimento,
        $employee['DEPARTAMENTO'],
        $employee['CEP'],
        $employee['RUA'],
        $employee['NUMERO_CASA'],
        $employee['BAIRRO'],
        $employee['CIDADE']
    );

}*/

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empregado</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/SPAAL ico.ico"/>
</head>
<body>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="./img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
    <a href="/aniversariantes">
        <button class="lista">
            Aniversariantes
        </button>
    </a>
    <a href="/lista-funcionarios">
        <button class="lista" style="margin-left: 15px">
            Funcionarios
        </button>
    </a>
    <a href="/logout">
        <button class="lista" style="width: 60px; margin-left: 10px;">
            Sair
        </button>
    </a>
</header>
<form method="post" class="form-cadastro" style="
    display: flex;
    margin-bottom: 20px;
    text-align: left;
    font-weight: bold;
    width: 60%;
    padding-right: 5%;
    padding-left: 5%;">
    <div style="display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                ">
        <label style="width: 25%">
            Número de registro:
            <input type="text"
                   name="registro"
                   value="<?= $registro; ?>"
                   required />
        </label>
        <label style="width: 50%">
            Nome:
            <input type="text"
                   name="nome"
                   value="<?= $nome;?>"
                   required>
        </label>
    </div>

    <div style="display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                ">
        <label style="width: 50%">
            CPF:
            <input type="text"
                   name="CPF"
                   value="<?= $cpf;?>">
        </label>
    </div>

    <div style="display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                ">
        <label style="width: 150px">
            Data de admissão:
            <input type="date"
                   name="data-admissao"
                   value="<?= $dataAdmissao?>"
                   required>
        </label>
        <label  style="width: 150px">
            Data de demissão:
            <input type="date"
                   name="data-demissao"
                   value="">
        </label>
        <label style="width: 160px">
            Data de nascimento:
            <input type="date"
                   name="data-nascimento"
                   value="<?= $dataNascimento?>"
                   required>
        </label>

    </div>


    <label style="margin-top: 15px">
        Departamento:
        <input type="text"
               name="departamento"
               value="<?= $departamento?>"
               required>
    </label>
    <label style="margin-top: 15px">
        CEP:
        <input type="text"
               name="Cep"
               value="<?= $cep?>"
               required>
    </label>
    <label style="margin-top: 15px">
        Rua:
        <input type="text"
               name="Rua"
               value="<?= $rua?>"
               required>
    </label>
    <label style="margin-top: 15px">
        Numero:
        <input type="text"
               name="Numero"
               value="<?= $numeroCasa?>"
               required>
    </label>
    <label style="margin-top: 15px">
        Bairro:
        <input type="text"
               name="Bairro"
               value="<?= $bairro?>"
               required>
    </label>
    <label style="margin-top: 15px">
        Cidade:
        <input type="text"
               name="Cidade"
               value="<?= $cidade?>"
               required>
    </label>
    <label>
        <button type="submit">Salvar</button>
</form>
</body>
</html>

