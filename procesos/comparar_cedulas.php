<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);
$data = 0;
$cont = 0;

$consulta = pg_query("select * from clientes where identificacion='$_POST[cedula]' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $cont++;
}

if ($cont == 0) {
    $data = 0;
} else {
    $data = 1;
}
echo $data;
?>