<?php

session_start();
include 'base.php';
conectarse();
$texto2 = $_GET['term'];

$consulta = pg_query("select P.cod_productos, P.codigo, P.cod_barras, P.articulo, D.precio_compra, D.cantidad, D.descuento_producto, P.iva, P.series from factura_compra F, detalle_factura_compra D, productos P where D.cod_productos = P.cod_productos and D.id_factura_compra=F.id_factura_compra and F.id_factura_compra='$_GET[ids]' and codigo like '%$texto2%' and F.id_empresa = '$_SESSION[id_empresa]' and P.id_empresa = '$_SESSION[id_empresa]'");
while ($row = pg_fetch_row($consulta)) {
    $data[] = array(
        'value' => $row[1],
        'producto' => $row[3],
        'precio' => $row[4],
        'canti' => $row[5],
        'descuento' => $row[6],
        'iva_producto' => $row[7],
        'carga_series' => $row[8],
        'cod_producto' => $row[0]
    );
}

//$consulta2 = pg_query("select P.cod_productos, P.codigo, P.cod_barras, P.articulo, D.precio_compra, D.cantidad, D.descuento_producto, P.iva, P.series from factura_compra F, detalle_factura_compra D, productos P where D.cod_productos = P.cod_productos and D.id_factura_compra=F.id_factura_compra and F.id_factura_compra='$_GET[ids]' and cod_barras like '%$texto2%' ");
//while ($row = pg_fetch_row($consulta2)) {
//    $data[] = array(
//        'value' => $row[2],
//        'producto' => $row[3],
//        'precio' => $row[4],
//        'canti' => $row[5],
//        'descuento' => $row[6],
//        'iva_producto' => $row[7],
//        'carga_series' => $row[8],
//        'cod_producto' => $row[0]
//    );
//}

echo $data = json_encode($data);
?>
