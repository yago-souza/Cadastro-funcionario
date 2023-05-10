<?php

use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new EmployeeRepository($pdo);

$emloyeesList = $repository->allEmployees();
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
	<title>Relatório de Aniversariantes do Mês</title>
</head>
<header>
    <h1>Cadastro de Empregado</h1>
    <img class="logo" src="./img/LOGO%20SPAAL%202%20JPG.jpg" alt="Logo da Empresa">
    <a href="/">
        <button class="lista">
            Cadastrar funcionario
        </button>
    </a>
</header>
<body>

	<h1>Lista de funcionarios</h1>

	<table>
		<thead>
			<tr>
				<th>Registro</th>
				<th>Nome</th>
				<th>Setor</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach ($emloyeesList as $emloyee):?>
			<tr>
				<td><a href="./editar-funcionario?registro=<?=$emloyee->getRegistro();?>"><?= $emloyee->getRegistro(); ?></a></td>
				<td><?= $emloyee->getNome(); ?></td>
				<td><?= $emloyee->getDepartamento(); ?></td>
			</tr>
        <?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>
