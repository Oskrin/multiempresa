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


/////////////////contador devolucion///////////
$cont1 = 0;
$consulta = pg_query("select max(id_devolucion_compra) from devolucion_compra");
while ($row = pg_fetch_row($consulta)) {
    $cont1 = $row[0];
}
$cont1++;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:DEVOLUCIÓN COMPRA:.</title>
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
        <script type="text/javascript" src="../js/devolucion.js"></script>
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

                    <a class="brand" href="index.html">
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
                                        <h3>DEVOLUCIÓN EN COMPRA</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <div class="widget-content">
                                                <div class="widget big-stats-container">
                                                    <form id="formularios_fac" name="formularios_fac" method="post" class="form">
                                                        <fieldset>
                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label for="comprobante" style="width: 100%">Comprobante Nro:</label></td>   
                                                                    <td><input type="text" name="comprobante" id="comprobante" class="campo" readonly style="width: 100px" value="<?php echo $cont1 ?>"/></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Fecha Actual:</label></td>
                                                                    <td><input type="text" name="fecha_actual" id="fecha_actual" class="campo" readonly style="margin-left: 10px; width: 100px" value="<?php echo date("Y-m-d"); ?>" /></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Hora Actual:</label></td>
                                                                    <td><input type="text" name="hora_actual" id="hora_actual" class="campo" readonly style="margin-left: 10px; width: 100px" /></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Digitador (a): </label></td>
                                                                    <td><input type="text" name="digitador" id="digitador" value="<?php echo $_SESSION['nombres'] ?>" class="campo" style="width: 200px" readonly/></td>
                                                                    <td><input type="hidden" name="comprobante2" id="comprobante2" class="campo" style="width: 100px" value="<?php echo $cont1 ?>" /></td>
                                                                </tr>  
                                                            </table> 

                                                            <hr style="color: #0056b2;" /> 

                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label style="width: 100%">Proveedor: <font color="red">*</font></label></td>
                                                                    <td><select name="tipo_docu" id="tipo_docu" required style="width: 170px">
                                                                            <option value="">......Seleccione......</option>
                                                                            <option value="Cedula">Cedula</option>
                                                                            <option value="Ruc">Ruc</option>
                                                                            <option value="Pasaporte">Pasaporte</option>  
                                                                        </select></td>
                                                                    <td><label style="width: 100%; margin-left: 10px">Nro de Identificación: </label></td>
                                                                    <td><input type="text" name="ruc_ci" id="ruc_ci" class="campo" style="width: 150px; margin-left: 5px"/></td>
                                                                    <td><input type="text" name="empresa" id="empresa" class="campo" style="width: 250px" /></td>
                                                                    <td><input type="hidden" name="id_proveedor" id="id_proveedor" class="campo" style="width: 180px" /></td>
                                                                </tr>  
                                                            </table>

                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label style="width: 100%">Tipo de comprobante: <font color="red">*</font></label></td>  
                                                                    <td><select name="tipo_comprobante" id="tipo_comprobante" style="width: 300px">
                                                                            <option value="">......Seleccione comprobante......</option>  
                                                                            <option value="Factura"> Factura</option>
                                                                            <option value="Nota_venta"> Nota o boleta de venta</option>
                                                                        </select></td>
                                                                </tr>  
                                                            </table>

                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label style="width: 100%">Nro. de serie: <font color="red">*</font></label></td>
                                                                    <td><input type="text" name="serie" id="serie" class="campo" placeholder="Buscar..." style="width: 250px"/></td>
                                                                    <td><label style="width: 100%;margin-left: 10px;">Nro. de Autorización: <font color="red">*</font></label></td>
                                                                    <td><input type="text" name="autorizacion" id="autorizacion" class="campo" maxlength="45"/></td>
                                                                    <td><input type="hidden" name="id_factura_compra" id="id_factura_compra" class="campo" maxlength="45"/></td>
                                                                </tr>
                                                            </table>

                                                            <hr style="color: #0056b2;" /> 
                                                            <p>Detalle de la factura</p>
                                                            <table cellpadding="2" border="0" style="margin-left: 10px">
                                                                <tr>
                                                                    <td><label>Código:</label></td>   
                                                                    <td><label>Producto:</label></td>   
                                                                    <td><label>Cantidad:</label></td>   
                                                                    <td><label>Precio:</label></td>
                                                                    <td><label>Series:</label></td>
                                                                </tr>

                                                                <tr>
                                                                    <td><input type="text" name="codigo" id="codigo" class="campo" style="width: 180px"  placeholder="Buscar..."/></td>
                                                                    <td><input type="text" name="producto" id="producto" class="campo" style="width: 230px"  placeholder="Buscar..."/></td>
                                                                    <td><input type="text" name="cantidad" id="cantidad" class="campo" style="width: 60px" maxlength="10"/></td>
                                                                    <td><input type="text" name="precio" id="precio" class="campo" style="width: 60px" maxlength="10"/></td>
                                                                    <td><input type="button" class="btn btn-primary" id='btncargar' style="margin-top: -10px" value="Cargar"></td>
                                                                    <td><input type="hidden" name="canti" id="canti" class="campo" style="width: 60px" maxlength="10" value="" /></td>
                                                                    <td><input type="hidden" name="descuento" id="descuento" class="campo" style="width: 60px" maxlength="10"/></td>
                                                                    <td><input type="hidden" name="iva_producto" id="iva_producto" class="campo" style="width: 60px" maxlength="10" value="" /></td>
                                                                    <td><input type="hidden" name="carga_series" id="carga_series" class="campo" style="width: 100px" maxlength="10"/></td>
                                                                    <td><input type="hidden" name="cod_producto" id="cod_producto" class="campo" style="width: 100px" maxlength="10"/></td>
                                                                </tr>
                                                            </table>

                                                            <div style="margin-left: 10px">
                                                                <table id="list" align="center"></table>
                                                            </div>

                                                            <div style="margin-left: 10px">
                                                                <table border="0" cellpadding="2">
                                                                    <tr>
                                                                        <td><label>Observaciones:</label></td>
                                                                        <td><textarea name="observaciones" id="observaciones" class="campo" style="width: 300px; margin-top: 20px; height: 50px" ></textarea></td>
                                                                    </tr> 
                                                                </table>
                                                            </div>

                                                            <div style="margin-left: 625px; margin-top: -90px">
                                                                <table border="0" cellspacing="2">
                                                                    <tr>
                                                                        <td><label for="total_p" style="width: 100%">Tarifa 0:</label></td>
                                                                        <td><input type="text" style="width:80px" name="total_p" id="total_p" readonly value="0.00" class="campo"/></td>
                                                                    </tr>    
                                                                    <tr>
                                                                        <td><label for="total_p2" style="width: 100%" >Tarifa  12:</label></td>
                                                                        <td><input type="text" style="width: 80px" name="total_p2" id="total_p2" readonly value="0.00" class="campo"/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label for="iva" style="width:100%" >12 %Iva:</label></td>
                                                                        <td><input type="text" style="width:80px" name="iva" id="iva" readonly value="0.00" class="campo"/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label for="desc" style="width: 100%" >Descuentos:</label></td>
                                                                        <td><input type="text" style="width: 80px" name="desc" id="desc" value="0.00" readonly class="campo"/></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td><label for="tot" style="width:100%" >Total:</label></td>
                                                                        <td><input type="text" style="width:80px" name="tot" id="tot" readonly value="0.00" class="campo" /></td>
                                                                    </tr>
                                                                </table> 
                                                            </div>
                                                        </fieldset>
                                                    </form>

                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                                                        <button class="btn btn-primary" id='btnModificar'><i class="icon-edit"></i> Modificar</button>
                                                        <button class="btn btn-primary" id='btnBuscar'><i class="icon-search"></i> Buscar</button>
                                                        <button class="btn btn-primary" id='btnNuevo'><i class="icon-pencil"></i> Nuevo</button>
                                                        <button class="btn btn-primary" id='btnImprimir'><i class="icon-print"></i> Imprimir</button>
                                                        <button class="btn btn-primary" id='btnAtras'><i class="icon-step-backward"></i> Atras</button>
                                                        <button class="btn btn-primary" id='btnAdelante'>Adelante <i class="icon-step-forward"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="series" title="AGREGAR SERIES">
                                                <table cellpadding="2" border="0" style="margin-left: 10px">
                                                    <tr>
                                                        <td><label>Series: <font color="red">*</font></label></td>
                                                        <td><div class="ui-widget"><select name="combobox" id="combobox" class="campo">
                                                                    <option value=""></option>
                                                                </select> </div></td>
                                                        <td><button class="btn btn-primary" id='btnAgregar' style="margin-top: -5px; margin-left: 50px"><i class="icon-list"></i> Agregar</button></td>
                                                    </tr>
                                                </table>
                                                <hr style="color: #0056b2;" /> 
                                                <div align="center">
                                                    <table id="list2"><tr><td></td></tr></table>
                                                    <div class="form-actions">
                                                        <button class="btn btn-primary" id='btnGuardarSeries'><i class="icon-save"></i> Guardar</button>
                                                        <button class="btn btn-primary" id='btnCancelarSeries'><i class="icon-remove-sign"></i> Cancelar</button>
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

        <div id="buscar_devolucion_compras" title="BUSCAR DEVOLUCIONES COMPRAS">
            <table id="list3"><tr><td></td></tr></table>
            <div id="pager3"></div>
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