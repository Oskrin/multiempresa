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
        <title>.:REPARACION EQUIPO:.</title>
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
        <script type="text/javascript" src="../js/reparacionEquipo.js"></script>
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
                                        <h3>REPARACIÓN</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <form class="form-horizontal" id="formReparaEquipo" name="formReparaEquipo" method="post">
                                                <fieldset>
                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtRegistro">Nro.Registro:</label>
                                                        <div class="controls" >
                                                            <input type="text" id="txtRegistro" name="txtRegistro" readonly class="campo" />
                                                        </div>

                                                        <label class="control-label2" for="txtCliente">Nombre Cliente: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text" id="txtCliente" name="txtCliente" class="campo" />
                                                            <input type="hidden" id="txtClienteId" name="txtClienteId" />
                                                        </div>			
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtIngreso">Fecha Ingreso: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" id="txtIngreso" name="txtIngreso" class="campo" />
                                                        </div>
                                                        <label class="control-label2" for="txtMante">Total:</label>
                                                        <div class="controls2">
                                                            <input type="text" id="txtMante" name="txtMante"  class="campo" placeholder="$0.00"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtTipoEquipo">Tipo de Equipo: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" id="txtTipoEquipo" name="txtTipoEquipo" class="campo" />
                                                            <input type="hidden" id="txtTipoEquipoId" name="txtTipoEquipoId" />
                                                        </div>
                                                        <label class="control-label2" for="txtModelo">Modelo:</label>
                                                        <div class="controls2">
                                                            <input type="text" id="txtModelo" name="txtModelo" class="campo" />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtSerie">Nro. Serie:</label>
                                                        <div class="controls">
                                                            <input type="text" id="txtSerie" name="txtSerie" class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="txtColor">Color: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text" id="txtColor" name="txtColor" class="campo" />
                                                            <input type="hidden" id="txtColorId" name="txtColorId" class="campo"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="txtMarca">Marca: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" id="txtMarca" name="txtMarca" class="campo" />
                                                            <input type="hidden" id="txtMarcaId" name="txtMarcaId" class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="email">Responsable:</label>
                                                        <div class="controls2">
                                                            <input type="text" id="resp" readonly value="<?php echo $_SESSION['nombres'] ?>" class="campo"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtObservaciones">Observaciones:</label>
                                                        <div class="controls">
                                                            <textarea id="txtObservaciones" name="txtObservaciones" class="campo"></textarea>
                                                        </div>
                                                        <label class="control-label2" for="notas_cli">Accesorios:</label>
                                                        <div class="controls2">
                                                            <textarea id="txtAccesorios" name="txtAccesorios"class="campo"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="txtReco">Recomendaciones:</label>
                                                        <div class="controls">
                                                            <textarea id="txtReco" name="txtReco" class="campo"></textarea>
                                                        </div>
                                                    </div>
                                                    <br />
                                                </fieldset>
                                                <div class="form-actions">
                                                    <button class="btn btn-primary" id='btnAgregar'><i class="icon-edit"></i> Agregar Reparaciones</button>
                                                    <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                                                    <button class="btn btn-primary" id='btnBuscar'><i class="icon-search"></i> Buscar</button>
                                                    <button class="btn btn-primary" id='btnNuevo'><i class="icon-pencil"></i> Nuevo</button>
                                                </div>
                                            </form>
                                           
                                            <div id="grilla" style="margin-left: 10px">
                                                <table id="list"></table>
                                                <div id="pager"></div>
                                            </div>

                                            <div id="tRepraciones" title="Agregar Reparaciones">
                                                <div class="widget-content">
                                                    <div class="tabbable">
                                                        <form class="form-horizontal" id="reparaciones_form" name="reparaciones_form" method="post">
                                                            <fieldset>
                                                                <div class="control-group">
                                                                    <label class="control-label3" for="tipo_docu">Tipo Daño:</label>
                                                                    <div class="controls5" >
                                                                        <select id="selectRepa" name="selectRepa">
                                                                            <?php
                                                                            include '../procesos/base.php';
                                                                            conectarse();
                                                                            $consulta = pg_query("select * from trabajo");
                                                                            while ($row = pg_fetch_row($consulta)) {
                                                                                echo "<option value=" . $row[0] . " data-foo=" . $row[2] . ">" . $row[1] . "</option>";
                                                                            }
                                                                            ?>
                                                                        </select> 
                                                                    </div>  
                                                                    <div class="controls8" >
                                                                        <button class="btn btn-primary" id='agreDa'>Agregar</button>
                                                                    </div>
                                                                    <br/>
                                                                    <label class="control-label3" for="tipo_docu">Producto:</label> 
                                                                    <div class="controls5" >
                                                                        <input type='text' id="selectPro" name="selectPro" placeholder="Buscar..." />  
                                                                    </div>
                                                                    <div class="controls7" >
                                                                        <input type='text' id="contador" value='1' style="width: 40px; height: 25px " />  
                                                                        <input type='hidden' id="precioPro"  />
                                                                        <input type='hidden' id="codigoPro" />
                                                                    </div>
                                                                    <div class="controls8" >
                                                                        <button class="btn btn-primary" id='agrePro'>Agregar</button>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </form>
                                                    </div>
                                                </div>
                                                <br />    
                                                <table id="tblRepracion" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>                                
                                                            <th style="width:20%">Código</th>
                                                            <th style="width:10%">Cantidad</th>                        
                                                            <th style="width:50%">Bien/Servicio</th>                        
                                                            <th style="width:20%">Precio</th>                        
                                                            <th> </th>
                                                            <th style="display:none;" ></th>                                  
                                                        </tr>                                                                                
                                                    </thead>
                                                    <tfoot>
                                                    </tfoot>
                                                    <tbody> 
                                                        <tr>

                                                        </tr>                           
                                                    </tbody>
                                                </table>       
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