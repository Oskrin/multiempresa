<?php

session_start();
include 'base.php';
conectarse();
$texto2 = $_GET['term'];
$tipo = $_GET['tipo_precio'];
$consulta = pg_query("select * from productos where articulo like '%$texto2%' and id_empresa = '$_SESSION[id_empresa]'");

while ($row = pg_fetch_row($consulta)) {
    if ($tipo == "MINORISTA") {
        $data[] = array(
            'value' => $row[3],
            'codigo' => $row[1],
            'p_venta' => $row[9],
            'disponibles' => $row[13],
            'iva_producto' => $row[4],
            'carga_series' => $row[5],
            'cod_producto' => $row[0],
            'des' => $row[19],
            'inventar' => $row[21]
        );
    } else {
        if ($tipo == "MAYORISTA") {
            $data[] = array(
                'value' => $row[3],
                'codigo' => $row[1],
                'p_venta' => $row[10],
                'disponibles' => $row[13],
                'iva_producto' => $row[4],
                'carga_series' => $row[5],
                'cod_producto' => $row[0],
                'des' => $row[19],
                'inventar' => $row[21]
            );
        }
    }
}




echo $data = json_encode($data);
?>
