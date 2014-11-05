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
        </div>      
    </header>        
    <hr>
    <div id="linea">
        <h3>PAGOS REALIZADOS INTERNOS REALIZADOS POR LA EMPRESA </h3>
    </div>';
    include '../../procesos/base.php';
    conectarse();    
    $total=0;
    $sub=0;
    $desc=0;
    $ivaT=0;
    $repetido=0;   
    $contador=0; 
    $consulta=pg_query('select * FROM proveedores order by id_proveedor asc');
    while($row=pg_fetch_row($consulta)){
        $total=0;
        $sub=0;
        $saldo=0;
        $repetido=0; 
        $contador=0;   
        $num_fact=0;
        ///////////internos
        $sql1=pg_query("select * from factura_compra where id_proveedor='$row[0]' order by forma_pago asc;");        
        if(pg_num_rows($sql1)>0){
            while($row1=pg_fetch_row($sql1)){  
                if($repetido==0){
                    $codigo.='<h2 style="color:#1B8D72;font-weight: bold;font-size:13px;">RUC/CI: '.$row[2].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row[3].'</h2>';
                    $codigo.='<table>';                                          
                    $codigo.='<tr>                
                    <td style="width:80px;text-align:center;">Comprobante</td>    
                    <td style="width:100px;text-align:center;">Tipo Documento</td>
                    <td style="width:150px;text-align:center;">Nro Factura</td>    
                    <td style="width:80px;text-align:center;">Total</td>
                    <td style="width:80px;text-align:center;">Valor Pago</td>
                    <td style="width:80px;text-align:center;">Saldo</td>
                    <td style="width:90px;text-align:center;">Fecha Pago</td>
                    <td style="width:80px;text-align:center;">Tipo Pago</td></tr><hr>';
                    $repetido=1;   
                    $repetido=1;
                    $contador=1;
                    $codigo.='</table>';  
                }
                if($row1[14]=='Contado'){
                    $codigo.='<table>';  
                    $codigo.='<tr>
                    <td style="width:80px;text-align:center;">'.$row1[4].'</td>
                    <td style="width:100px;text-align:center;">Factura</td>
                    <td style="width:150px;text-align:center;">'.substr($row1[11],8,30).'</td>
                    <td style="width:80px;text-align:center;">'.($row1[19]).'</td>
                    <td style="width:80px;text-align:center;">'.$row1[19].'</td>
                    <td style="width:80px;text-align:center;">0.00</td>
                    <td style="width:90px;text-align:center;">'.$row1[5].'</td>
                    <td style="width:80px;text-align:center;">'.$row1[10].'</td>
                    </tr>';   
                    $codigo.='</table>';  
                    $sub=$sub+$row1[19];
                }
                else{
                    $sql3=pg_query("select * from pagos_pagar where num_factura='$row1[11]';");
                    if(pg_num_rows($sql3)>0){
                        $codigo.='<table>';  
                        while($row3=pg_fetch_row($sql3)){                           
                            $codigo.='<tr>
                            <td style="width:80px;text-align:center;">'.$row[0].'</td>
                            <td style="width:100px;text-align:center;">'.$row3[9].'</td>
                            <td style="width:150px;text-align:center;">'.substr($row1[11],8,30).'</td>
                            <td style="width:80px;text-align:center;">'.($row3[12]+$row3[13]).' </td>
                            <td style="width:80px;text-align:center;">'.$row3[12].'</td>
                            <td style="width:80px;text-align:center;">'.$row3[13].'</td>
                            <td style="width:90px;text-align:center;">'.$row3[4].'</td>
                            <td style="width:80px;text-align:center;">'.$row3[6].'</td>
                            </tr>';   
                            $sub=$sub+$row3[12];  
                        }
                        $codigo.='</table>';     
                    }                   
                }
            }      
            if($contador>0){
                $codigo.='<hr>';
                $codigo.='<table>';                                                
                $codigo.='<tr>
                <td style="width:200px;text-align:center;font-weight:bold">'."Totales".'</td>
                <td style="width:800px;text-align:center;font-weight:bold">'.(number_format($sub,2,',','.')).'</td>';
                $codigo.='</tr>';                           
                $codigo.='</table>'; 
                $codigo.='<br/>';
            }
        //////////////////           
        }         
        
    }

    $codigo=utf8_decode($codigo);
    $dompdf= new DOMPDF();
    $dompdf->load_html($codigo);
    ini_set("memory_limit","1000M");
    $dompdf->set_paper("A4","portrait");
    $dompdf->render();
    //$dompdf->stream("reporteRegistro.pdf");
    $dompdf->stream('pagos_realizados_clientes.pdf',array('Attachment'=>0));
?>