<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);

$cont = 0;
$consulta = pg_query("select max(id_marca) from marcas");
while ($row = pg_fetch_row($consulta)) {
    $cont = $row[0];
}
$cont++;

pg_query("insert into marcas values('$cont','$_POST[nombre_marca]','Activo','$_SESSION[id_empresa]')");
$data = 1;
echo $data;
?>
