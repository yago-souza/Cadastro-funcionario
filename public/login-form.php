
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Empregado</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <title>Relatório de Aniversariantes do Mês</title>
</head>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="../public/img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
</header>

<main class="container">
    <form class="container__formulario" method="post">
        <h2 class="formulario__titulo">Efetue login</h2>
        <div class="formulario__campo">
            <label class="campo__etiqueta" for="usuario">E-mail</label>
            <input name="email" type="email" class="campo__escrita" required
                   placeholder="Digite seu e-mail" id='usuario' />
        </div>

        <div class="formulario__campo">
            <label class="campo__etiqueta" for="senha">Senha</label>
            <input type="password" name="password" class="campo__escrita" required placeholder="Digite sua senha"
                   id='senha' />
        </div>

        <input class="formulario__botao" type="submit" value="Entrar" />
    </form>

</main>
