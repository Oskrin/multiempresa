<?php
session_start();
if (empty($_SESSION['id'])) {
    header('Location: index.php');
}
include '../menus/menu.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:INGRESO CLIENTES:.</title>
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
        <script type="text/javascript" src="../js/clientes.js"></script>
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
                                        <h3>CLIENTES</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <form class="form-horizontal" id="clientes_form" name="clientes_form" method="post">
                                                <fieldset>
                                                    <div class="control-group">											
                                                        <label class="control-label" for="tipo_docu">Tipo Documento: <font color="red">*</font></label>
                                                        <div class="controls" >
                                                            <select name="tipo_docu" id="tipo_docu" required class="campo">
                                                                <option value="">......Seleccione......</option>
                                                                <option value="Cedula">Cedula</option>
                                                                <option value="Ruc">Ruc</option>
                                                                <option value="Pasaporte">Pasaporte</option>
                                                            </select>
                                                        </div>

                                                        <label class="control-label2" for="ruc_ci">RUC/CI: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text" name="ruc_ci"  id="ruc_ci" placeholder="10000000000" required class="campo">
                                                            <input type="hidden" name="id_cliente"  id="id_cliente" readonly class="campo">
                                                        </div>			
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="nombres_cli">Nombres Completos: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" name="nombres_cli"  id="nombres_cli" placeholder="Nombres y Apellidos" required class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="tipo_cli">Tipo Cliente: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <select name="tipo_cli" id="tipo_cli" required class="campo">
                                                                <option value="">......Seleccione......</option>
                                                                <option value="natural">Natural</option>
                                                                <option value="juridico">Juridico</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="nro_telefono">Nro. Telefónico:</label>
                                                        <div class="controls">
                                                            <input type="text" name="nro_telefono" id="nro_telefono" placeholder="062-999-999" maxlength="10" class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="nro_celular">Nro. de Celular:</label>
                                                        <div class="controls2">
                                                            <input type="tel" name="nro_celular" id="nro_celular" maxlength="10" placeholder="09-9999-999" class="campo" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="pais_cli">País: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" name="pais_cli" id="pais_cli" placeholder="Ingrese un pais" required  class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="ciudad_cli">Ciudad: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text" name="ciudad_cli" id="ciudad_cli" required class="campo" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="direccion_cli">Dirección: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" name="direccion_cli" id="direccion_cli" placeholder="Direccion cliente" required  class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="email">E-mail: </label>
                                                        <div class="controls2">
                                                            <input type="email" name="email" id="email" placeholder="xxxx@example.com" class="campo"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="cupo_credito">Cupo de Crédito: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" name="cupo_credito" id="cupo_credito" class="campo" />
                                                        </div>
                                                        <label class="control-label2" for="notas_cli">Notas: </label>
                                                        <div class="controls2">
                                                            <textarea name="notas_cli" id="notas_cli" rows="3" class="campo"></textarea>
                                                        </div>
                                                    </div>
                                                    <br />
                                                </fieldset>
                                            </form>
                                            <div class="form-actions">
                                                <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                                                <button class="btn btn-primary" id='btnModificar'><i class="icon-edit"></i> Modificar</button>
                                                <button class="btn btn-primary" id='btnBuscar'><i class="icon-search"></i> Buscar</button>
                                                <button class="btn btn-primary" id='btnNuevo'><i class="icon-pencil"></i> Nuevo</button>
                                            </div>

                                            <div id="clientes" title="Búsqueda de Clientes" class="">
                                                <table id="list"><tr><td></td></tr></table>
                                                <div id="pager"></div>
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