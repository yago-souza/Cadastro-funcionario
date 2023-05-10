<?php

use Spaal\RH\Infrastructure\Persistence\ConnectionCreator;
use Spaal\RH\Infrastructure\Repository\EmployeeRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = ConnectionCreator::createConnection();
$repository = new EmployeeRepository($pdo);
$month = 1;
$monthArray = ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'];
$monthNumArray = [
    'Janeiro' => 1,
    'Fevereiro' => 2,
    'Março' => 3,
    'Abril' => 4,
    'Maio' => 5,
    'Junho' => 6,
    'Julho' => 7,
    'Agosto' => 8,
    'Setembro' => 9,
    'Outubro' => 10,
    'Novembro' => 11,
    'Dezembro' => 12
];

if (array_key_exists('month', $_POST)) {
    if (strlen($_POST['month']) <= 2 && $_POST['month'] != null && $_POST['month'] != 0) {
        $month = intval($_POST['month']);

    } else {
        $month = $monthNumArray[$_POST['month']];
    }
}
$emloyeesList = $repository->employeesBirthAt($month);
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

	<h1>Relatório de Aniversariantes do Mês</h1>

    <div class="month" style="
                            text-align: center;
                            margin: 10px;
                            display: flex;
                            justify-content: space-evenly;
                            ">
        <form method="post" style="
                            text-align: center;
                            margin: 10px;
                            ">
        <select style="
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat #eeeeee;
    background-position: 218px center;
    width: 200px;
    height: 35px;
    border: 1px solid #ddd;
    font-size: 20px;
    text-align: center;
"name="month">
            <option value="<?= $month?>"><?= $monthArray[$month-1];?></option>
            <option value="1" class="month-select">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
        </select>
            <input type="submit" name="submit" value="Enviar" style="
    background: url(http://www.webcis.com.br/images/imagens-noticias/select/ico-seta-appearance.gif) no-repeat #eeeeee;
    background-position: 218px center;
    width: 80px;
    height: 35px;
    border: 1px solid #ddd;
    font-size: 20px;
    text-align: center;"/>
        </form>
    </div>
	<table>
		<thead>
			<tr>
				<th>Dia</th>
				<th>Nome</th>
				<th>Setor</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach ($emloyeesList as $emloyee):?>
			<tr>
				<td><?= $emloyee->getDataNascimento()->format('d'); ?></td>
				<td><?= $emloyee->getNome(); ?></td>
				<td><?= $emloyee->getDepartamento(); ?></td>
			</tr>
        <?php endforeach; ?>
		</tbody>
	</table>
</body>
</html>
