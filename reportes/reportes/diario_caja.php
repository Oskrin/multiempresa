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
                <h4 style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desde el : ';
            $codigo.=$_GET['inicio'];
            $codigo.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hasta el : '.$_GET['fin'].'</h4>
        </div>      
    </header>        
    <hr>
    <div id="linea">
        <h3>DIARIO  DE CAJA </h3>
    </div>';
    include '../../procesos/base.php';
    conectarse();    
    $total=0;
    $contado=0;
    $credito=0;
    $cheque=0;
    $gastos=0;
    $cxc=0;
    $sql=pg_query("SELECT sum(total_venta::float) FROM factura_venta where fecha_actual between '$_GET[inicio]' and '$_GET[fin]' and forma_pago='Contado'");
    while($row=pg_fetch_row($sql)){
        $contado=$row[0];
    }
    $sql=pg_query("SELECT sum(total_venta::float) FROM factura_venta where fecha_actual between '$_GET[inicio]' and '$_GET[fin]' and forma_pago='Credito'");
    while($row=pg_fetch_row($sql)){
        $credito=$row[0];
    }
    $sql=pg_query("SELECT sum(total_venta::float) FROM factura_venta where fecha_actual between '$_GET[inicio]' and '$_GET[fin]' and forma_pago='Cheque'");
    while($row=pg_fetch_row($sql)){
        $cheque=$row[0];
    }
    $sql=pg_query("select sum(total::float) from gastos_internos where fecha_actual between '$_GET[inicio]' and '$_GET[fin]'");
    while($row=pg_fetch_row($sql)){
        $gastos=$row[0];
    }
    $sql=pg_query("select sum(valor_pagado::float) from pagos_cobrar where fecha_actual between '$_GET[inicio]' and '$_GET[fin]'");
    while($row=pg_fetch_row($sql)){
        $cxc=$row[0];
    }
    $codigo.="<table style='font-size:12px;' border=0>";
    $codigo.="<tr style='font-weight:bold;'>
    <td style='width:650px;'>Ingresos</td>
    <td style='width:100px;'>Total</td>
    </tr>
    <tr>
    <td>Ventas Efectivo</td>
    <td>".$contado."</td>
    </tr>
    <tr>
    <td>Ventas Crédito</td>
    <td>".$credito."</td>
    </tr>
    <tr>
    <td>Ventas Cheque</td>
    <td>".$cheque."</td>
    </tr>

    <tr>
    <td>Cuentas Cobrar</td>
    <td>".$cxc."</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    </tr>
    <tr style=''>
    <td style='width:650px;'>Gastos</td>
    <td style='width:100px;'>".$gastos."</td>
    </tr>
    <tr style='font-weight:bold;'>
    <td style='width:650px;'>Resultados Ventas</td>
    <td style='width:100px;'>".($contado+$cheque+$credito+$cxc)."</td>
    </tr>
    <tr style='font-weight:bold;'>
    <td style='width:650px;'>Total Dinero en caja</td>
    <td style='width:100px;'>".(($contado+$cxc)-$gastos)."</td>
    </tr>";
    $codigo.="</table>";
    $codigo=utf8_decode($codigo);
    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","1000M");
    $dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("reporteRegistro.pdf");
    $dompdf->stream('gasto_interno_fechas.pdf',array('Attachment'=>0));
?>
