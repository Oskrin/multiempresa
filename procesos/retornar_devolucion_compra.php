<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);
$id = $_GET['com'];
$arr_data = array();

$consulta = pg_query("select D.fecha_actual, D.hora_actual, U.nombre_usuario, U.apellido_usuario, P.id_proveedor, P.tipo_documento, P.identificacion_pro, P.empresa_pro, D.tipo_comprobante, D.num_serie, D.num_autorizacion,  D.observaciones from devolucion_compra D, proveedores P, usuario U where D.id_usuario = U.id_usuario and P.id_proveedor = D.id_proveedor and D.comprobante='" . $id . "' and D.id_empresa = '$_SESSION[id_empresa]' and P.id_empresa = '$_SESSION[id_empresa]' and U.id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $arr_data[] = $row[0];
    $arr_data[] = $row[1];
    $arr_data[] = $row[2];
    $arr_data[] = $row[3];
    $arr_data[] = $row[4];
    $arr_data[] = $row[5];
    $arr_data[] = $row[6];
    $arr_data[] = $row[7];
    $arr_data[] = $row[8];
    $arr_data[] = $row[9];
    $arr_data[] = $row[10];
    $arr_data[] = $row[11];
}
echo json_encode($arr_data);
?>
