<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);

$cont = 0;
/////////////////////consultar//////////////
$consulta = pg_query("select * from gastos where id_factura_venta = '$_POST[id_factura_venta]' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $cont = 1;
    $valor = $row[8];
    $acumulado = $row[9];
}


if ($cont == 1) {
    $conta = 0;
    $consulta = pg_query("select * from gastos order by id_gastos asc");
    while ($row = pg_fetch_row($consulta)) {
        $conta = $row[0];
    }
    $conta++;
    
    $pago = number_format($_POST[valor], 2, '.', '');
    $acumu = $acumulado + $pago;
    $deci = number_format($acumu, 2, '.', '');
    
    $sal = $valor - $pago;
    $saldo = number_format($sal, 2, '.', '');
    
     pg_query("insert into gastos values('$conta','$_SESSION[id]','$_POST[id_factura_venta]','$_POST[comprobante]','$_POST[fecha_actual]','$_POST[hora_actual]','$_POST[descripcion]','$pago','$saldo','$deci','Activo','$_SESSION[id_empresa]')");
    $data = 1;  
} else {
    //////////contador///////
    $conta = 0;
    $consulta = pg_query("select * from gastos order by id_gastos asc");
    while ($row = pg_fetch_row($consulta)) {
        $conta = $row[0];
    }
    $conta++;
    
    $cal = $_POST[saldo] - $_POST[valor]; 
    $valor = number_format($cal, 2, '.', '');
    $pago = number_format($_POST[valor], 2, '.', '');
/////////////////////////guardar gastos///////////////////
    pg_query("insert into gastos values('$conta','$_SESSION[id]','$_POST[id_factura_venta]','$_POST[comprobante]','$_POST[fecha_actual]','$_POST[hora_actual]','$_POST[descripcion]','$pago','$valor','$pago','Activo','$_SESSION[id_empresa]')");
    $data = 1;
}


echo $data;
?>
