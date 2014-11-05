<?php

session_start();
include 'base.php';
conectarse();
error_reporting(0);
$id = $_GET['com'];
$arr_data = array();

$consulta = pg_query("select I.fecha_actual, I.hora_actual, U.nombre_usuario, U.apellido_usuario, I.origen, I.destino, I.observaciones from ingresos I, usuario U where I.id_usuario = U.id_usuario and I.comprobante='" . $id . "' and I.id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $arr_data[] = $row[0];
    $arr_data[] = $row[1];
    $arr_data[] = $row[2];
    $arr_data[] = $row[3];
    $arr_data[] = $row[4];
    $arr_data[] = $row[5];
    $arr_data[] = $row[6];
}
echo json_encode($arr_data);
?>
