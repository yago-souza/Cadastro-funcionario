<?php

namespace Spaal\RH\Infrastructure\Persistence;

use PDO;

class ConnectionCreator
{
    public static function createConnection(): PDO
    {
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
        #'oci:192.100.100.245/GLPROD', 'glprod', 'dbaspl'
        $db_username = 'glprod';
        $db_password = 'dbaspl';
        $db = 'oci:dbname=192.100.100.245/GLPROD;charset=AL32UTF8';
        $connection = new PDO($db,$db_username,$db_password);
        #$databasePath = __DIR__ . '/../../../banco';
        #$connection = new PDO('sqlite:' . $databasePath);
<<<<<<< HEAD
=======
=======
        $db_username = 'GLDEV';
        $db_password = 'manager';
        $db = 'oci:dbname=192.100.100.245/GLDEV';
        $connection = new PDO($db,$db_username,$db_password);
        #$databasePath =__DIR__ . '/../../../banco';
       # $connection = new PDO('sqlite:' . $databasePath);
>>>>>>> 407b0560f2eb1addaaf84f7736ecda8787cef404
>>>>>>> 117cdf2c77719e0c2620bf1d85b9f760c40f6212
        ## Faz com que o PDO lance excessões se tornou o modo padrão do ATTR_ERRMODE A PARTIR DA VERSÃO 8
        #$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        #Define o FETCH MODE para ASSOCIATIVE como padrão
        #$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        /*
         *
$db_username = 'GLDEV';
$db_password = 'manager';
$db = 'oci:dbname=192.100.100.245/GLDEV';
$connection = new PDO($db,$db_username,$db_password);

echo '<p>teste</p>';
exit();
        */
        return $connection;
    }
}