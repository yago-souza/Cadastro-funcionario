<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empregado</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="/img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
    <a href="/aniversariantes">
        <button class="lista">
            Aniversariantes
        </button>
    </a>
</header>
<form method="post">
    <label>
        Número de registro:
        <input type="text" name="registro" required>
    </label>
    <label>
        Nome:
        <input type="text" name="nome" required>
    </label>

    <label>
        Data de admissão:
        <input type="date" name="data-admissao" required>
    </label>
    <label>
        Data de demissão:
        <input type="date" name="data-demissao">
    </label>
    <label>
        Data de nascimento:
        <input type="date" name="data-nascimento" required>
    </label>
    <label>
        Departamento:
        <input type="text" name="departamento" required>
    </label>
    <label>
        CEP:
        <input type="text" name="Cep" required>
    </label>
    <label>
        Rua:
        <input type="text" name="Rua" required>
    </label>
    <label>
        Numero:
        <input type="text" name="Numero" required>
    </label>
    <label>
        Bairro:
        <input type="text" name="Bairro" required>
    </label>
    <label>
        Cidade:
        <input type="text" name="Cidade" required>
    </label>
    <label>
        <button type="submit">Salvar</button>
</form>
</body>
</html>

