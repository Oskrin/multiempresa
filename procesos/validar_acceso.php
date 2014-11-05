<?php

session_start();
include 'base.php';
conectarse();
$data = "";
$cont = 0;

$consulta = pg_query("select * from seguridad where clave='$_POST[clave]' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $cont = 1;
}

if ($cont == 1) {
    $data = 1;
} else {
    $data = 0;
}
echo $data;
?>
