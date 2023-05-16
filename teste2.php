<?php
$param = $_POST;
$db_username = "GLPROD";
$db_password = "dbaspl";
$db = "oci:dbname=\\192.100.100.245";
$conn = new PDO($db,$db_username,$db_password);
$name = $param['module'];
$file = $param['file'];
$stmt = $conn->exec("INSERT INTO AL_MODULE (AL_MODULENAME, AL_MODULEFILE) VALUES ('$name', '$file')");