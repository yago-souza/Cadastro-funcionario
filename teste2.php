<?php
<<<<<<< HEAD
#$param = $_POST;
$db_username = 'glprod';
$db_password = 'dbaspl';
$db = 'oci:192.100.100.245/GLPROD';
$conexao = new PDO($db,$db_username,$db_password, );
#$name = $param['module'];
#$file = $param['file'];

$sql = 'SELECT * FROM EMPLOYEE';
var_dump($sql);
$statement = $conexao->prepare($sql);
var_dump($statement->errorInfo());
try {
    $statement->execute();
} catch (PDOException $exception) {
    var_dump($exception->getMessage());
    var_dump($exception->getCode());
    var_dump($exception->getLine());
    var_dump($exception->getFile());
    var_dump($exception->getPrevious());

}

var_dump($statement->execute());

$retornoSql1 = $statement->fetch(PDO::FETCH_ASSOC);
var_dump($retornoSql1);
=======
$param = $_POST;
$db_username = "GLPROD";
$db_password = "dbaspl";
$db = "oci:dbname=\\192.100.100.245";
$conn = new PDO($db,$db_username,$db_password);
$name = $param['module'];
$file = $param['file'];
$stmt = $conn->exec("INSERT INTO AL_MODULE (AL_MODULENAME, AL_MODULEFILE) VALUES ('$name', '$file')");
>>>>>>> 407b0560f2eb1addaaf84f7736ecda8787cef404
