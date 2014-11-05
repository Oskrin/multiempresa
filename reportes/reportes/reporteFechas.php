<?php
require('../dompdf/dompdf_config.inc.php');
	$codigo='<html> 
    <head> 
   		<link rel="stylesheet" href="../../css/estilosFactura.css" type="text/css" /> 
	</head> 
	<body>
		<header>
			<img src="../../imagenes/logo1.jpg" />
			<h2>P&S Systems</h2>
			<h3>VENTA & MANTENIMIENTO</h3>
		</header>
		<hr>
		<div id="linea">
			<h3>REPORTE FECHAS DE EQUIPOS</h3>
		</div>';
		include '../../procesos/base.php';
		conectarse();        
        $total=0;
		$consulta = pg_query("select * from trabajo_tecnico,registro_equipo,clientes,categoria where trabajo_tecnico.id_registro=registro_equipo.id_registro and registro_equipo.estado='2' and registro_equipo.id_cliente=clientes.id_cliente and registro_equipo.id_categoria=categoria.id_categoria and (registro_equipo.fecha_salida between '$_GET[inicio]' and '$_GET[fin]');");   
         $codigo.='<div id="cuerpo">';          
            $codigo.='<table border="2">';                       
                $codigo.='<tr>                
                <td style="width:100px">Registro # </td>
                <td style="width:200px">Tipo Equipo </td>
                <td style="width:300px">Cliente </td>
                <td style="width:150px">Total Reparaciones </td>
                <td style="width:100px">Descuentos</td>
                <td style="width:100px">Total </td></tr>';
            $codigo.='</table>'; 
            $codigo.='<table border="2">';                       
		while ($row = pg_fetch_row($consulta)) {			 	                                  
             $codigo.='<tr><td style="width:100px">';
             $codigo.=$row[2];
             $codigo.='</td><td style="width:200px">';
             $codigo.=$row[29];
             $codigo.='</td><td style="width:300px">';
             $codigo.=$row[25]." ".$row[26];
             $codigo.='</td><td style="width:150px">';
             $codigo.="$ ".$row[3];
             $codigo.='</td><td style="width:100px">';
             $codigo.="$ ".$row[18];
             $codigo.='</td><td style="width:100px">';
             $codigo.="$ ".($row[3]-$row[18]);
             $total=$total+($row[3]-$row[18]);
             $codigo.='</td></tr>';            
        }           
            $codigo.='<tr><td  colspan="5" style="width:100px">Total recaudado </td>';
            $codigo.='<td>';                          
            $codigo.="$ ".$total;                         
            $codigo.="</td></tr>";                           
             $codigo.='</table>'; 
            $codigo.='</div>';                
    	   $codigo.='</body></html>';           				 
$codigo=utf8_decode($codigo);
$dompdf= new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->set_paper("A4","landscape");
$dompdf->render();
//$dompdf->stream("reporteRegistro.pdf");
$dompdf->stream('reporteCategorias.pdf',array('Attachment'=>0));
?>