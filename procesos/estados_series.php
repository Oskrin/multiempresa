<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);
//
///////cambiar estados series/////////////
$consulta2 = pg_query("select * from series_compra where cod_productos = '$_POST[codigo]' and id_factura_compra ='$_POST[comprobante]' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta2)) {
    $series2 = $row[3];

    pg_query("Update series_compra Set estado='Activo' where cod_productos='$_POST[codigo]' and serie = '$series2' and id_empresa = '$_SESSION[id_empresa]'");
}

$data = 1;
echo $data;
/////////////////////////////////
?> 
