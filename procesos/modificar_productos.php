<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);

///////////////////modificar productos//////////////////
$valor = number_format($_POST[precio_compra], 2, '.', '');
pg_query("Update productos Set codigo='$_POST[cod_prod]', cod_barras='$_POST[cod_barras]', articulo='$_POST[nombre_art]', iva='$_POST[iva]', series='$_POST[series]', precio_compra='$valor', utilidad_minorista='$_POST[utilidad_minorista]', utilidad_mayorista='$_POST[utilidad_mayorista]', iva_minorista='$_POST[precio_minorista]', iva_mayorista='$_POST[precio_mayorista]',categoria='$_POST[categoria]', marca='$_POST[marca]', stock='$_POST[stock]', stock_minimo='$_POST[minimo]', stock_maximo='$_POST[maximo]', fecha_creacion='$_POST[fecha_creacion]', caracteristicas='$_POST[modelo]', observaciones='$_POST[aplicacion]', descuento='$_POST[descuento]', estado='$_POST[vendible]', inventariable='$_POST[inventario]' where cod_productos='$_POST[cod_productos]' and id_empresa = '$_SESSION[id_empresa]'");
///////////////////////////////////////////////////////

$data = 1;
echo $data;
?>
