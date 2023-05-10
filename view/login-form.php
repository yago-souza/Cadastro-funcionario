
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empregado</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./img/SPAAL ico.ico"/>
    <title>Relatório de Aniversariantes do Mês</title>
</head>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="./img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
</header>

<main class="container">
    <form class="form-login" method="post">
        <h2>Efetue login</h2>
        <div class="login-input">
            <label style="width: 25%" for="usuario">Usuario</label>
            <input name="usuario" class="campo__escrita" required
                   placeholder="Digite seu usuario" id='usuário' />
        </div>

        <div class="login-input">
            <label style="width: 25%" for="senha">Senha</label>
            <input type="password" name="password" class="campo__escrita" required placeholder="Digite sua senha"
                   id='senha' />
        </div>

        <input class="formulario__botao" type="submit" value="Entrar" />
    </form>

</main>
