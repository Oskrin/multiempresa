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
            <h3>RESUMEN DE FACTURAS COMPRAS </h3>
        </div>';
        include '../../procesos/base.php';
        conectarse();    
        $total=0;
        $sub=0;
        $desc=0;
        $ivaT=0;
         $repetido=0;
        $consulta=pg_query('select * from proveedores order by id_proveedor asc');
        while($row=pg_fetch_row($consulta)){
            $consulta1=pg_query("select num_serie,fecha_actual,hora_actual,fecha_cancelacion,num_autorizacion,factura_compra.forma_pago,tarifa0,tarifa12,iva_compra,descuento_compra,total_compra,empresa_pro,identificacion_pro,representante_legal,id_factura_compra from factura_compra,proveedores where factura_compra.id_proveedor=proveedores.id_proveedor and factura_compra.id_proveedor='$row[0]' and fecha_actual between '$_GET[inicio]' and '$_GET[fin]' order by factura_compra.id_factura_compra");
            $contador=pg_num_rows($consulta1);
            if($contador > 0){
               
                while($row1=pg_fetch_row($consulta1)){                     
                    $codigo.='<div id="cuerpo">';
                    if($repetido==0){                        
                       
                        $codigo.='<table>';                      
                        $codigo.='<tr>                
                        <td style="width:70px">Comprobante</td>
                        <td style="width:60px">Fecha</td>
                        <td style="width:70px">Nro Factura</td>
                        <td style="width:60px">Subtotal</td>
                        <td style="width:60px">Descuento</td>                       
                        <td style="width:70px">Tarifa 0%</td>
                        <td style="width:70px">Tarifa 12%</td>
                         <td style="width:60px">Iva 12%</td>
                        <td style="width:70px">Total</td>
                        <td style="width:70px">Fecha Pago</td>
                        <td style="width:70px">Tipo Pago</td></tr><hr>';
                        $repetido=1;   
                        $codigo.='</table>';                    
                    } 
                    $codigo.='<table>';                               
                        $codigo.='<tr>                
                        <td style="width:70px">'.$row1[14].'</td>
                        <td style="width:60px">'.$row1[1].'</td>
                        <td style="width:70px">'.substr($row1[0],8).'</td>';
                        $sub=$sub+($row1[10]-$row1[8]-$row1[9]);
                        $codigo.='<td style="width:60px">'.($row1[10]-$row1[8]-$row1[9]).'</td>';
                        $desc=$desc+$row1[9];
                        $codigo.='<td style="width:60px">'.$row1[9].'</td>                       
                        <td style="width:70px">'.$row1[6].'</td>
                        <td style="width:70px">'.$row1[7].'</td>';
                        $ivaT=$ivaT+$row1[8];
                        $codigo.='<td style="width:60px">'.$row1[8].'</td>';
                        $total=$total+$row1[10];
                        $codigo.='<td style="width:70px">'.$row1[10].'</td>
                        <td style="width:70px">'.$row1[3].'</td>
                        <td style="width:70px">'.$row1[5].'</td></tr>';                         
                    $codigo.='</table>'; 
                   
                    
                   
                    $codigo.='</div>';
                }
            }  
        }
          
            $codigo.='<hr>';
             $codigo.='<table>';                                                
                $codigo.='<tr>
                <td style="width:200px;text-align:center;font-weight:bold">'."Totales".'</td>
                <td style="width:80px;text-align:center;font-weight:bold">'.(number_format($sub,2,',','.')).'</td>
                <td style="width:200px;font-weight:bold">'.(number_format($desc,2,',','.')).'</td>
                <td style="width:60px;text-align:center;font-weight:bold">'.(number_format($ivaT,2,',','.')).'</td>
                <td style="width:60px;text-align:center;font-weight:bold">'.(number_format($total,2,',','.')).'</td>';
                $codigo.='</tr>';                           
                $codigo.='</table>'; 
        
       
             
    $codigo.='</body></html>';                           
    $codigo=utf8_decode($codigo);

    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","100M");
    $dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("reporteRegistro.pdf");
    $dompdf->stream('ventasAgrupadas.pdf',array('Attachment'=>0));
?>