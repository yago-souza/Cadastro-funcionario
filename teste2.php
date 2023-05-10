<?php
#$param = $_POST;
$db_username = 'glprod';
$db_password = 'dbaspl';
$db = 'oci:192.100.100.245/GLPROD';
$conexao = new PDO($db,$db_username,$db_password, );
#$name = $param['module'];
#$file = $param['file'];

/*$sql = 'SELECT * FROM EMPLOYEE';
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
*/
$sqlQuery = "SELECT *

                    FROM SPL_VW_EMPLOYEES
                    WHERE EXTRACT (MONTH FROM DATA_NASCIMENTO) = 5
AND EMP_NUM NOT IN ('3270','3292','3217','3451','3612')
                    ORDER BY EXTRACT(DAY FROM DATA_NASCIMENTO)";
        $stmt = $conexao->prepare($sqlQuery);
        $stmt->execute();

var_dump($stmt->fetchAll(PDO::FETCH_ASSOC));