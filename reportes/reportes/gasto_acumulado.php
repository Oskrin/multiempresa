<?php
require('../dompdf/dompdf_config.inc.php');
    $codigo='<html> 
    <head> 
        <link rel="stylesheet" href="../../css/estilosAgrupados.css" type="text/css" /> 
    </head> 
    <body>
        <header>
            <img src="../../images/logo_empresa.jpg" />
            <div id="me">
                <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;P&S SYSTEMS</h2>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SERVICIOS INTEGRALES</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;YEPEZ RIVERA PABLO SANTIAGO</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dirección: Av. Eugenio Espejo 9-66 y Juan Fransico Bonilla Telf: 2603193</h4>
                <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desde: '.$_GET['inicio'].' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta: '.$_GET['fin'].'</h4>
        </div>      
    </header>        
    <hr>
    <div id="linea">
        <h3>REPORTES DE GASTOS </h3>
    </div>';
    include '../../procesos/base.php';
    conectarse();    
    $total=0;
    $id_fac=0;
    $fecha=0;
    $contador=0; 
    $num_fac=0;
    $cliente="";
    $acumlado=0;
    $tot=0;
    $sql=pg_query("SELECT DISTINCT(id_factura_venta) FROM gastos where fecha_actual between '$_GET[inicio]' and '$_GET[fin]' order by id_factura_venta asc;");
        $codigo.='<table border=0 style="font-size:10px;">';                      
        $codigo.='<tr>                
        <td style="width:70px;text-align:center;">N. Factura</td>    
        <td style="width:60px;text-align:center;">F. Factura</td>
        <td style="width:80px;text-align:center;">Cliente</td>
        <td style="width:50px;text-align:center;">T. Venta</td>    
        <td style="width:120px;text-align:center;">Descripción</td>
        <td style="width:60px;text-align:center;">Fecha Pago</td>
        <td style="width:60px;text-align:center;">Valor Pago</td>
        <td style="width:50px;text-align:center;">Saldo</td>
        <td style="width:60px;text-align:center;">Acumulado</td></tr><tr><td colspan=9><hr></td></tr>';
    while($row=pg_fetch_row($sql)){
        $sql1=pg_query("select id_factura_venta,num_factura,nombres_cli,total_venta,fecha_actual from factura_venta,clientes where factura_venta.id_cliente=clientes.id_cliente and id_factura_venta='$row[0]'");
        while($row1=pg_fetch_row($sql1)){
            $id_fac=$row1[0];
            $num_fac=$row1[1];
            $total=$row1[3];
            $fecha=$row1[4];
            $cliente=$row1[2];
        }
        $sql2=pg_query("SELECT * FROM gastos where fecha_actual between '$_GET[inicio]' and '$_GET[fin]' and id_factura_venta='$id_fac' order by id_factura_venta asc");
            
            while($row2=pg_fetch_row($sql2)){
                $codigo.='<tr>                
                <td style="width:70px;text-align:left;">'.substr($num_fac,8,30).'</td>    
                <td style="width:60px;text-align:left;">'.$fecha.'</td>
                <td style="width:80px;text-align:left;">'.$cliente.'</td>   
                <td style="width:50px;text-align:center;">'.$total.'</td>    
                <td style="width:120px;text-align:left;">'.$row2[6].'</td>
                <td style="width:60px;text-align:left;">'.$row2[4].'</td>
                <td style="width:60px;text-align:center;">'.$row2[7].'</td> 
                <td style="width:50px;text-align:center;">'.$row2[8].'</td>
                <td style="width:60px;text-align:center;">'.$row2[9].'</td></tr>';
                $tot=$tot+$total;
                $acumlado=$acumlado+$row2[7];
            }   
    }
     $codigo.='<tr><td colspan=9><hr></td></tr>
            <tr style="font-weight:bold">                
                <td style="width:150px;text-align:left;" colspan=2>Totales Venta:</td>    
                <td style="width:80px;text-align:right;" colspan=2>'.($tot).'</td>
                <td style="width:150px;text-align:right;" colspan=2>Totales Gastos:</td>    
                <td style="width:80px;text-align:right;" colspan=3>'.($acumlado).'</td><tr>
            </table><br />'; 
   

    $codigo=utf8_decode($codigo);
    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","1000M");
    $dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("reporteRegistro.pdf");
    $dompdf->stream('pagos_realizados_clientes.pdf',array('Attachment'=>0));
?>