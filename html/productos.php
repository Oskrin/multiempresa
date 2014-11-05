<?php
session_start();
include '../procesos/base.php';
if (empty($_SESSION['id'])) {
    header('Location: index.php');
}
include '../menus/menu.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:INGRESO DE PRODUCTOS:.</title>
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
        <script type="text/javascript" src="../js/productos.js"></script>
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
                                        <h3>PRODUCTOS</h3>
                                    </div> <!-- /widget-header -->

                                    <div class="widget-content">
                                        <div class="tabbable">
                                            <form class="form-horizontal" id="productos_form" name="productos_form" method="post">
                                                <fieldset>
                                                    <div class="control-group">											
                                                        <label class="control-label" for="cod_prod">Código Producto: <font color="red">*</font></label>
                                                        <div class="controls" >
                                                            <input type="text" name="cod_prod" id="cod_prod" required placeholder="El código debe ser único" class="campo" />
                                                        </div>

                                                        <label class="control-label2" for="ruc_ci">Código Barras: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text" name="cod_barras" id="cod_barras" required placeholder="El código debe ser único" class="campo" />
                                                            <input type="hidden" name="cod_productos" id="cod_productos" readonly class="campo" />
                                                        </div>			
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="nombre_art">Artículo: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text" name="nombre_art" id="nombre_art" placeholder="Usb 0000x" class="campo" />
                                                        </div>
                                                        <label class="control-label2" for="iva">Iva: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <select id="iva" name="iva" class="campo" style="width: 200px">
                                                                <option value="">......Seleccione......</option>
                                                                <option value="Si">Si</option> 
                                                                <option value="No">No</option> 
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="precio_compra">Precio Compra: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text"  name="precio_compra" id="precio_compra"   placeholder="$0.00" style="width: 150px;" required  class="campo" />
                                                        </div>
                                                        <label class="control-label2" for="series">Series: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <select id="series" name="series" style="width: 200px">
                                                                <option value="">......Seleccione......</option>
                                                                <option value="Si">Si</option> 
                                                                <option value="No">No</option> 
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="utilidad_minorista">Utilidad Minorista: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text"  name="utilidad_minorista" id="utilidad_minorista"   placeholder="%" style="width: 150px;" required class="campo" />
                                                        </div>
                                                        <label class="control-label2" for="utilidad_mayorista">Utilidad Mayorista: <font color="red">*</font></label>
                                                        <div class="controls2">
                                                            <input type="text"  name="utilidad_mayorista" id="utilidad_mayorista"   placeholder="%"  style="width: 150px"  class="campo" required />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">											
                                                        <label class="control-label" for="precio_minorista">PSP Minorista:</label>
                                                        <div class="controls">
                                                            <input type="text"  name="precio_minorista" id="precio_minorista" valu="0" readonly placeholder="$0.00"  style="width: 150px;" class="campo" required />
                                                        </div>
                                                        <label class="control-label2" for="precio_mayorista">PSP Mayorista:</label>
                                                        <div class="controls2">
                                                            <input type="text"  name="precio_mayorista" id="precio_mayorista" valu="0" readonly placeholder="$0.00"  style="width: 150px;" class="campo" required />
                                                        </div>
                                                    </div>

                                                    <div class="control-group">
                                                        <label class="control-label" for="categoria">Categoría:</label>
                                                        <div class="controls">
                                                            <select id="categoria" name="categoria" style="width: 180px;">
                                                                <option value="">Seleccione una Categoria</option>
                                                                <?php
                                                                $consulta = pg_query("select * from categoria where id_empresa = '$_SESSION[id_empresa]'");
                                                                while ($row = pg_fetch_row($consulta)) {
                                                                    echo "<option id=$row[0] value=$row[1]>$row[1]</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="controls3">
                                                            <input type="button" class="btn btn-primary" id='btnCategoria' value="..."/>
                                                        </div>
                                                        <label class="control-label2" for="marca">Marca:</label>
                                                        <div class="controls2">
                                                            <select id="marca" name="marca" style="width: 200px;">
                                                                <option value="">Seleccione una Marca</option>
                                                                <?php
                                                                $consulta2 = pg_query("select * from marcas where id_empresa = '$_SESSION[id_empresa]'");
                                                                while ($row = pg_fetch_row($consulta2)) {
                                                                    echo "<option id=$row[0] value=$row[1]>$row[1]</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="controls4">
                                                            <input type="button" class="btn btn-primary" id='btnMarca' value="...">
                                                        </div>
                                                    </div>

                                                    <div class="control-group">	
                                                        <label class="control-label" for="descuento">Descuento:</label>
                                                        <div class="controls">
                                                            <input type="text"  name="descuento" id="descuento"  value="0" style="width: 100px" required class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="stock">Stock:</label>
                                                        <div class="controls2">
                                                            <input type="text"  name="stock" id="stock"  value="0" style="width: 100px" required class="campo"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">	
                                                        <label class="control-label" for="minimo">Stock Mínimo:</label>
                                                        <div class="controls">
                                                            <input name="minimo" id="minimo" type="text" value="1" style="width: 100px" required class="campo"/>
                                                        </div>
                                                        <label class="control-label2" for="maximo">Stock Máximo:</label>
                                                        <div class="controls2">
                                                            <input type="text" name="maximo" id="maximo"  value="1" style="width: 100px" required class="campo"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">	
                                                        <label class="control-label" for="fecha_creacion">Fecha Creación: <font color="red">*</font></label>
                                                        <div class="controls">
                                                            <input type="text"  name="fecha_creacion" id="fecha_creacion" required class="campo" style="width: 200px" value="<?php echo date("Y-m-d"); ?>"/>
                                                        </div>
                                                        <label class="control-label2" for="modelo">Caracteristicas: </label>
                                                        <div class="controls2" >
                                                            <input type="text" name="modelo" id="modelo"    class="campo"placeholder="Ingrese las caracteristicas"/>
                                                        </div>
                                                    </div>

                                                    <div class="control-group">	
                                                        <label class="control-label" for="vendible">Vendible:</label>
                                                        <div class="controls">
                                                            <select name="vendible" id="vendible" style="width: 200px;">
                                                                <option value="Activo">Activo</option> 
                                                                <option value="Pasivo">Pasivo</option> 
                                                            </select>
                                                        </div>
                                                        <label class="control-label2" for="inventario">Inventariable:</label>
                                                        <div class="controls2" >
                                                            <select name="inventario" id="inventario" style="width: 100px;">
                                                                <option value="Si">Si</option> 
                                                                <option value="No">No</option> 
                                                            </select>
                                                        </div>	
                                                    </div>

                                                    <div class="control-group">	
                                                        <label class="control-label" for="aplicacion">Observaciones:</label>
                                                        <div class="controls" >
                                                            <textarea name="aplicacion" id="aplicacion" rows="3" class="campo" style="width: 300px"></textarea>
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

                                            <div id="productos" title="Búsqueda de Productos" class="">
                                                <table id="list"><tr><td></td></tr></table>
                                                <div id="pager"></div>
                                            </div>

                                            <div id="categorias" title="AGREGAR CATEGORIA">
                                                <div class="control-group">
                                                    <label class="control-label" for="nombre_categoria">Nombre Categoria: <font color="red">*</font></label>
                                                    <div class="controls" >
                                                        <input type="text" name="nombre_categoria" id="nombre_categoria" class="campo" placeholder="Categoria" required/>
                                                    </div>  
                                                </div>	
                                                <button class="btn btn-primary" id='btnGuardarCategoria'>Guardar</button>
                                            </div>

                                            <div id="marcas" title="AGREGAR MARCA">
                                                <div class="control-group">
                                                    <label class="control-label" for="nombre_marca">Nombre Marca: <font color="red">*</font></label>
                                                    <div class="controls" >
                                                        <input type="text" name="nombre_marca" id="nombre_marca" class="campo" placeholder="Ingrese la Marca" required />
                                                    </div>  
                                                </div>	
                                                <button class="btn btn-primary" id='btnGuardarMarca'>Guardar</button>
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
