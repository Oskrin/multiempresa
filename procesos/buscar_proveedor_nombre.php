<?php

session_start();
include 'base.php';
conectarse();
$texto = $_GET['term'];

$consulta = pg_query("select * from proveedores where empresa_pro like '%$texto%' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $data[] = array(
        'value' => $row[3],
        'id_proveedor' => $row[0]
    );
}
echo $data = json_encode($data);
?>
