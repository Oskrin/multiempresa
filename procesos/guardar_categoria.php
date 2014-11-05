<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);
$cont = 0;

$consulta = pg_query("select max(id_categoria) from categoria");
while ($row = pg_fetch_row($consulta)) {
    $cont = $row[0];
}
$cont++;

pg_query("insert into categoria values('$cont','$_POST[nombre_categoria]','Activo','$_SESSION[id_empresa]')");
$data = 1;
echo $data;
?>
