<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empregado</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="../public/img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
    <a href="http://192.100.100.245/api/RH/public/aniversariantes">
        <button class="lista">
            Aniversariantes
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
            <input type="text" name="registro" required>
        </label>
        <label style="width: 50%">
            Nome:
            <input type="text" name="nome" required>
        </label>
    </div>

    <div style="display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                ">
        <label style="width: 50%">
            CPF:
            <input type="text" name="CPF" required>
        </label>
    </div>

    <div style="display: flex;
                justify-content: space-between;
                align-items: center;
                width: 100%;
                ">
        <label style="width: 150px">
            Data de admissão:
            <input type="date" name="data-admissao" required>
        </label>
        <label  style="width: 150px">
            Data de demissão:
            <input type="date" name="data-demissao">
        </label>
        <label style="width: 160px">
            Data de nascimento:
            <input type="date" name="data-nascimento" required>
        </label>

    </div>


    <label style="margin-top: 15px">
        Departamento:
        <input type="text" name="departamento" required>
    </label>
    <label style="margin-top: 15px">
        CEP:
        <input type="text" name="Cep" required>
    </label>
    <label style="margin-top: 15px">
        Rua:
        <input type="text" name="Rua" required>
    </label>
    <label style="margin-top: 15px">
        Numero:
        <input type="text" name="Numero" required>
    </label>
    <label style="margin-top: 15px">
        Bairro:
        <input type="text" name="Bairro" required>
    </label>
    <label style="margin-top: 15px">
        Cidade:
        <input type="text" name="Cidade" required>
    </label>
    <label>
        <button type="submit">Salvar</button>
</form>
</body>
</html>

