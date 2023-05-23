<?php
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
>>>>>>> 57e33f36ba4be2fcc3e4949fd464bfc791b199e5
#$param = $_POST;
$db_username = 'glprod';
$db_password = 'dbaspl';
$db = 'oci:192.100.100.245/GLPROD';
$conexao = new PDO($db,$db_username,$db_password, );
#$name = $param['module'];
#$file = $param['file'];

<<<<<<< HEAD
/*$sql = 'SELECT * FROM EMPLOYEE';
=======
<<<<<<< HEAD
/*$sql = 'SELECT * FROM EMPLOYEE';
=======
$sql = 'SELECT * FROM EMPLOYEE';
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
>>>>>>> 57e33f36ba4be2fcc3e4949fd464bfc791b199e5
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
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 57e33f36ba4be2fcc3e4949fd464bfc791b199e5
*/
$sqlQuery = "SELECT *

                    FROM SPL_VW_EMPLOYEES
                    WHERE EXTRACT (MONTH FROM DATA_NASCIMENTO) = 5
AND EMP_NUM NOT IN ('3270','3292','3217','3451','3612')
                    ORDER BY EXTRACT(DAY FROM DATA_NASCIMENTO)";
        $stmt = $conexao->prepare($sqlQuery);
        $stmt->execute();

<<<<<<< HEAD
var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
=======
var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));
=======
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
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
>>>>>>> 57e33f36ba4be2fcc3e4949fd464bfc791b199e5
