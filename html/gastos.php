<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: index.php');
}
include '../menus/menu.php';

////////////////numero factura//////////////////
include '../procesos/base.php';
conectarse();
error_reporting(0);

/////////////////contador gastos///////////
$cont1 = 0;
$consulta2 = pg_query("select * from gastos_internos order by id_gastos asc");
while ($row = pg_fetch_row($consulta2)) {
    $cont1 = $row[0];
}
$cont1++;
///////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:GASTOS:.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 
        <link rel="stylesheet" type="text/css" href="../css/buttons.css"/>
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.custom.css"/>    
        <link rel="stylesheet" type="text/css" href="../css/normalize.css"/>    
        <link rel="stylesheet" type="text/css" href="../css/ui.jqgrid.css"/> 
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">

        <script type="text/javascript" src="../js/base.js"></script>
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/jquery-loader.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="../js/grid.locale-es.js"></script>
        <script type="text/javascript" src="../js/jquery.jqGrid.src.js"></script>
        <script type="text/javascript" src="../js/buttons.js" ></script>
        <script type="text/javascript" src="../js/validCampoFranz.js" ></script>
        <script type="text/javascript" src="../js/gastos_internos.js"></script>
        <script type="text/javascript" src="../js/datosUser.js"></script>
        <script type="text/javascript" src="../js/ventana_reporte.js"></script>
        <script type="text/javascript" src="../js/guidely/guidely.min.js"></script>

        <script type="text/javascript" src="../js/jquery.smartmenus.js"></script>
        <link href="../css/sm-core-css.css" rel="stylesheet" type="text/css" />
        <link href="../css/sm-blue/sm-blue.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">

                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a class="brand" href="">
                        <h1>P&S System</h1>				
                    </a>

                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <div class="controls">
                                <button class="btn btn-facebook-alt"><i class="icon-facebook-sign"></i> Facebook</button>
                                <button class="btn btn-twitter-alt"><i class="icon-twitter-sign"></i> Twitter</button>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- /Inicio  Menu Principal -->
            <div class="subnavbar">
                <?Php
                // Cabecera Menu 
                if ($_SESSION['cargo'] == '1') {
                    print menu_1();
                }
                if ($_SESSION['cargo'] == '2') {
                    print menu_2();
                }
                if ($_SESSION['cargo'] == '3') {
                    print menu_3();
                }
                ?> 
            </div>
            <!-- /Fin  Menu Principal -->

            <div class="main">
                <div class="main-inner">
                    <div class="container">
                        <div class="row">
                            <div class="span12">      		
                                <div class="widget ">
                                    <div class="widget-header">
                                        <i class="icon-list-alt"></i>
                                        <h3>GASTOS INTERNOS</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <div class="widget-content">
                                                <div class="widget big-stats-container">
                                                    <form id="formularios_fac" name="formularios_fac" method="post">
                                                        <fieldset>
                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label for="comprobante" style="width: 100%">Comprobante Nro:</label></td>   
                                                                    <td><input type="text" name="comprobante" id="comprobante" class="campo" readonly style="width: 80px" value="<?php echo $cont1 ?>" /></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Fecha:</label></td>
                                                                    <td><input type="text" name="fecha_actual" id="fecha_actual" class="campo" readonly style="margin-left: 5px; width: 100px" value="<?php echo date("Y-m-d"); ?>" /></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Hora:</label></td>
                                                                    <td><input type="text" name="hora_actual" id="hora_actual" class="campo" readonly style="margin-left: 5px; width: 100px"/></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Digitador (a): <font color="red">*</font></label></td>
                                                                    <td><input type="text" name="digitador" id="digitador" value="<?php echo $_SESSION['nombres'] ?>" class="campo" style="width: 200px" readonly/></td>
                                                                    <td><input type="hidden" name="comprobante2" id="comprobante2" class="campo" style="width: 100px" value="<?php echo $cont1 ?>" /></td>
                                                                </tr>  
                                                            </table> 
                                                            <br />
                                                            <div class="widget widget-nopad">
                                                                <div class="widget-header"> <i class="icon-list-alt"></i>
                                                                    <h3>REGISTRO GASTOS</h3>
                                                                </div>
                                                                <!-- /widget-header -->
                                                                <div class="widget-content">
                                                                    <div class="widget big-stats-container">
                                                                        <br />
                                                                        <p style="margin-left: 10px">DETALLE GASTOS</p>
                                                                        <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                            <tr>
                                                                                <td><label style="width: 100%">Proveedor: <font color="red">*</font></label></td>
                                                                                <td><select name="tipo_docu" id="tipo_docu" required style="width: 170px">
                                                                                        <option value="">......Seleccione......</option>
                                                                                        <option value="Cedula">Cedula</option>
                                                                                        <option value="Ruc">Ruc</option>
                                                                                        <option value="Pasaporte">Pasaporte</option>  
                                                                                    </select></td>
                                                                                <td><label style="width: 100%; margin-left: 10px">Nro de Identificación: <font color="red">*</font></label></td>
                                                                                <td><input type="text" name="ruc_ci" id="ruc_ci" class="campo" style="width: 150px; margin-left: 5px"/></td>
                                                                                <td><input type="text" name="empresa" id="empresa" class="campo" style="width: 220px" /></td>
                                                                                <td><input type="hidden" name="id_proveedor" id="id_proveedor" class="campo" style="width: 180px" /></td>
                                                                            </tr>  
                                                                        </table>
                                                                        <table cellpadding="2" border="0" style="margin-left: 10px" > 
                                                                            <tr>
                                                                                <td><label for="num_factura" style="width: 100%">Num. Factura: <font color="red">*</font></label></td>  
                                                                                <td><input type="text" name="num_factura" id="num_factura" required maxlength="10" class="campo" style="width: 200px"/></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label for="descripcion" style="width: 100%">Descripción: <font color="red">*</font></label></td>  
                                                                                <td><input type="text" name="descripcion" id="descripcion" required class="campo" style="width: 300px"/></td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td><label for="total" style="width: 100%">Total: <font color="red">*</font></label></td>
                                                                                <td><input type="text" name="total" id="total" required maxlength="10" class="campo" style="width: 100px"/></td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </form>

                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                                                        <button class="btn btn-primary" id='btnModificar'><i class="icon-edit"></i> Modificar</button>
                                                        <button class="btn btn-primary" id='btnBuscar'><i class="icon-search"></i> Buscar</button>
                                                        <button class="btn btn-primary" id='btnNuevo'><i class="icon-pencil"></i> Nuevo</button>
                                                        <button class="btn btn-primary" id='btnAtras'><i class="icon-step-backward"></i> Atras</button>
                                                        <button class="btn btn-primary" id='btnAdelante'>Adelante <i class="icon-step-forward"></i></button>
                                                    </div>

                                                    <div id="buscar_gastos_internos" title="BUSCAR GASTOS INTERNOS">
                                                        <table id="list2"><tr><td></td></tr></table>
                                                        <div id="pager2"></div>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>

        <div class="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12">
                            &copy; 2014 <a href="">P&S System</a>.
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </body>
</html>
