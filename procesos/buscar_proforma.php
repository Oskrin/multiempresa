<?php

session_start();
include 'base.php';
conectarse();
$texto = $_GET['term'];

$consulta = pg_query("select id_proforma, comprobante from proforma where id_proforma::text like '%$texto%' and id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $data[] = array(
        'value' => $row[1],
        'id_proforma' => $row[0],
    );
}
echo $data = json_encode($data);
?>