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
        <h3>LISTA DE EQUIPOS EN ESTADO DE ENTEGADOS POR CLIENTE </h3>
    </div>';
    include '../../procesos/base.php';
    conectarse();    
    $total=0;
    $sub=0;
    $repetido=0;   
    $contador=0; 
    $consulta=pg_query("select id_cliente,identificacion,nombres_cli from clientes");
    while($row=pg_fetch_row($consulta)){
        $repetido=0;
        $total=0;
        $sql1=pg_query("select * from registro_equipo,color,marcas,usuario,categoria where categoria.id_categoria=registro_equipo.id_categoria and usuario.id_usuario=registro_equipo.id_usuario and marcas.id_marca=registro_equipo.id_marca and color.id_color=registro_equipo.id_color and id_cliente='$row[0]' and fecha_salida between '$_GET[inicio]' and '$_GET[fin]' and estado='2'");
        if(pg_num_rows($sql1)){
            if($repetido==0){
                $codigo.='<h2 style="color:#1B8D72;font-weight: bold;font-size:13px;">RUC/CI: '.$row[1].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row[2].'</h2><hr>';
                $codigo.='<table border=0 style="font-size:11px;">';    
                $codigo.='<tr style="font-weight:bold;">                
                <td style="width:60px;text-align:left;">Nro. Registro</td>    
                <td style="width:80px;text-align:left;">Equipo</td>
                <td style="width:100px;text-align:left;">Modelo</td>
                <td style="width:90px;text-align:left;">Nro. Serie</td>
                <td style="width:80px;text-align:left;">Color</td>
                <td style="width:60px;text-align:left;">Marca</td>
                <td style="width:100px;text-align:left;">Fecha Ingreso</td>
                <td style="width:100px;text-align:left;">Técnico</td></tr>';
                $repetido=1;
                      
            }
           
            while($row1=pg_fetch_row($sql1)){
                $codigo.='<tr>                
                <td style="width:60px;text-align:left;">'.$row1[0].'</td>    
                <td style="width:80px;text-align:left;">'.$row1[31].'</td>
                <td style="width:100px;text-align:left;">'.$row1[11].'</td>
                <td style="width:90px;text-align:left;">'.$row1[4].'</td>
                <td style="width:80px;text-align:left;">'.$row1[16].'</td>
                <td style="width:60px;text-align:left;">'.$row1[18].'</td>
                <td style="width:100px;text-align:left;">'.$row1[9].'</td>
                <td style="width:100px;text-align:left;">'.$row1[14].'</td></tr>';
            }
             $codigo.="<br /></table><br />";
            /*$codigo.='<hr><table>';                                                
            $codigo.='<tr>
            <td style="width:600px;text-align:left;font-weight:bold">'."Total:".'</td>
            <td style="width:150px;text-align:left;font-weight:bold">'.(number_format($total,2,',','.')).'</td>';
            $codigo.='</tr>';                           
            $codigo.='</table>'; 
            $codigo.='<br/>';    
            $total=0;*/ 
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
