<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);

//////////////eliminar series///////////
pg_query("delete from series_compra  where cod_productos='$_POST[codigo]' and id_factura_compra='$_POST[comprobante]' and id_empresa = '$_SESSION[id_empresa]'");
$data = 1;
echo $data;
/////////////////////////////////
?>
