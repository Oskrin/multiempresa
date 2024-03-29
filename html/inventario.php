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


/////////////////contador factura venta///////////
$cont1 = 0;
$consulta = pg_query("select max(id_inventario) from inventario");
while ($row = pg_fetch_row($consulta)) {
    $cont1 = $row[0];
}
$cont1++;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:INVENTARIO:.</title>
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
        <script type="text/javascript" src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="../js/grid.locale-es.js"></script>
        <script type="text/javascript" src="../js/jquery.jqGrid.src.js"></script>
        <script type="text/javascript" src="../js/buttons.js" ></script>
        <script type="text/javascript" src="../js/validCampoFranz.js" ></script>
        <script type="text/javascript" src="../js/inventario.js"></script>
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
                                        <i class="icon-user"></i>
                                        <h3>INVENTARIO GENERAL</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <div class="widget-content">
                                                <div class="widget big-stats-container">
                                                    <form id="formularios_fac" name="formularios_fac" method="post" class="form">
                                                        <fieldset>
                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label for="comprobante" style="width: 100% ">Comprobante:</label></td>  
                                                                    <td><input type="text" name="comprobante" id="comprobante" readonly class="campo" style="width: 60px" value="<?php echo $cont1 ?>"/> </td>
                                                                    <td><label for="fecha_actual"  style="width: 100%; margin-left: 15px">Fecha: </label></td>
                                                                    <td><input type="text" name="fecha_actual" id="fecha_actual" readonly value="<?php echo date("Y-m-d"); ?>" class="campo" style="width: 120px"/> </td>
                                                                    <td><label for="hora_actual"  style="width: 100%; margin-left: 15px">Hora: </label></td>
                                                                    <td><input type="text" name="hora_actual" id="hora_actual" readonly class="campo" style="width: 120px"/> </td>
                                                                    <td><label style="width: 100%; margin-left: 15px">Digitador (a): </label></td>
                                                                    <td><input type="text" name="digitador" id="digitador" value="<?php echo $_SESSION['nombres'] ?>" class="campo" style="width: 200px" readonly/></td>
                                                                </tr>
                                                            </table>
                                                            <hr style="color: #0056b2;" /> 

                                                            <p>Productos</p>
                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label>Código:</label></td>   
                                                                    <td><label>Producto:</label></td>   
                                                                    <td><label>Cantidad:</label></td>   
                                                                    <td><label style="width: 100%">P. Costo:</label></td>
                                                                    <td><label>Stock:</label></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="text" name="codigo" id="codigo" class="campo" style="width: 200px"  placeholder="Buscar..."/></td>
                                                                    <td><input type="text" name="producto" id="producto" class="campo" style="width: 200px"  placeholder="Buscar..."/></td>
                                                                    <td><input type="text" name="cantidad" id="cantidad" class="campo" style="width: 60px" maxlength="10"/></td>
                                                                    <td><input type="text" name="precio" id="precio" style="width: 60px" class="campo"/></td>
                                                                    <td><input type="text" name="stock" id="stock" class="campo" style="width: 60px" maxlength="10" value="" readonly/></td>
                                                                    <td><input type="hidden" name="p_venta" id="p_venta" class="campo" style="width: 60px" maxlength="10" value="" readonly/></td>
                                                                    <td><input type="hidden" name="existencia" id="existencia" class="campo" style="width: 60px" maxlength="10" value="" readonly/></td>
                                                                    <td><input type="hidden" name="diferencia" id="diferencia" class="campo" style="width: 60px" maxlength="10" value="" readonly/></td>
                                                                    <td><input type="hidden" name="cod_producto" id="cod_producto" class="campo" style="width: 100px"/></td>
                                                                </tr>
                                                            </table>

                                                            <div style="margin-left: 10px">
                                                                <table id="list"></table>
                                                                <div id="pager"></div>   
                                                            </div> 
                                                        </fieldset> 
                                                    </form>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                                                        <button class="btn btn-primary" id='btnModificar'><i class="icon-edit"></i> Modificar</button>
                                                        <button class="btn btn-primary" id='btnNuevo'><i class="icon-pencil"></i>Nuevo</button>
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