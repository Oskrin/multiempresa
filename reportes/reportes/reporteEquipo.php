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
			<h3>REVISION DE EQUIPOS</h3>
		</div>';
		include '../../procesos/base.php';
		conectarse();        
		$consulta = pg_query("select * from registro_equipo,color,marcas,clientes,usuario,categoria where registro_equipo.id_color=color.id_color and registro_equipo.id_marca=marcas.id_marca and registro_equipo.id_cliente=clientes.id_cliente and registro_equipo.id_usuario=usuario.id_usuario and registro_equipo.id_categoria=categoria.id_categoria and registro_equipo.id_registro='$_GET[id]'");   
         $codigo.='<div id="cuerpo">';   
         $codigo.='<table id="tblEntrega" border="2">';
		  while ($row = pg_fetch_row($consulta)) {			 	                      
                $codigo.='<tr>
                <td style="width:100px">Registro #: </td>
                <td style="width:100px">';
                $codigo.=$row[0];
                $codigo.='</td>
                <td style="width:100px">Fecha Ingreso: </td>
                <td style="width:150px">';
                $codigo.=$row[9];
                $codigo.='</td>
                <td style="width:100px">Fecha Salida: </td>
                <td style="width:150px">';
                $codigo.=$row[12];
                $codigo.='</td>
                <td style="width:80px">Cliente: </td>
                <td style="width:150px">';
                $codigo.=$row[24]." ".$row[25];
                $codigo.='</td>
                <tr>
                <td style="width:100px">Tipo Equipo: </td>
                <td style="width:100px">';
                $codigo.=$row[39];
                $codigo.='</td>
                <td style="width:100px">Nro de serie: </td>
                <td style="width:150px">';
                $codigo.=$row[4];
                $codigo.='</td>
                <td style="width:100px">Modelo: </td>
                <td style="width:150px">';
                $codigo.=$row[11];
                $codigo.='</td>
                <td style="width:80px">Marca: </td>
                <td style="width:150px">';
                $codigo.=$row[18];
                $codigo.='</td></tr>';                                   
            }
            $codigo.='</tr></table><br>';   
            $codigo.='</div>';                
    	   $codigo.='</body></html>';           				 
$codigo=utf8_decode($codigo);
$dompdf= new DOMPDF();
$dompdf->load_html($codigo);
ini_set("memory_limit","32M");
$dompdf->set_paper("A4","landscape");
$dompdf->render();
//$dompdf->stream("reporteRegistro.pdf");
$dompdf->stream('reporteEquipo.pdf',array('Attachment'=>0));
?>