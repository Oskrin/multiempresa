<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);

/////datos series/////
$campo1 = $_POST['campo1'];
$arreglo1 = explode('|', $campo1);
$nelem = count($arreglo1);
//////////////////////
///////////////////////////////////////////
for ($i = 1; $i < $nelem; $i++) {
    $cont1 = 0;
    /////////////////contador detalle factura compra/////////////
    $consulta = pg_query("select id_serie from series_compra order by id_serie asc");
    while ($row = pg_fetch_row($consulta)) {
        $cont1 = $row[0];
    }
    $cont1++;
    //////////////////////////  
    //
    ///guardar series compra////
    pg_query("insert into series_compra values('$cont1','$_POST[cod_producto]','$_POST[comprobante]','$arreglo1[$i]','','Activo','$_SESSION[id_empresa]')");
    ////////////////////////////////
}
$data = 1;
echo $data;
?>
