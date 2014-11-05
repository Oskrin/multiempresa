<?php
session_start();
session_destroy();
include '../procesos/base.php';
conectarse();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>.:INGRESO AL SISTEMA:.</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="../css/jquery-ui-1.10.4.custom.css"/> 
        <link href="../css/font-awesome.css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="../css/pages/signin.css" rel="stylesheet" type="text/css">

        <!--<script src="js/jquery-1.7.2.min.js"></script>-->
        <script src="../js/bootstrap.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/jquery-ui-1.10.4.custom.min.js"></script>
        <script type="text/javascript" src="../js/validCampoFranz.js" ></script>
        <script type="text/javascript" src="../js/index.js"></script>
        <script src="../js/signin.js"></script>
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
                    <a class="brand" href="index.php">
                        P&S System				
                    </a>		
                </div>
            </div>
        </div>

        <div class="account-container">
            <div class="content clearfix">
                <form action="" method="post" name="form_admin">
                    <h1>Usuario</h1>
                    <div class="login-fields">
                        <p>Por favor, proporcione sus datos</p>
                        <div class="field">
                            <label for="empresa">Empresa:</label>
                            <select id="empresa" name="empresa" style="width: 320px; height: 40px">
                                <?php
                                $consulta = pg_query("select id_empresa, nombre_empresa from empresa");
                                while ($row = pg_fetch_row($consulta)) {
                                    echo "<option value=$row[0]>$row[1]</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="field">
                            <label for="username">Usuario:</label>
                            <input type="text" id="txt_usuario" name="txt_usuario" placeholder="Usuario" class="login username-field" />
                        </div> <!-- /field -->

                        <div class="field">
                            <label for="password">Password:</label>
                            <input type="password" id="txt_contra" name="txt_contra" placeholder="Constraseña" class="login password-field"/>
                        </div>
                    </div>

                    <div class="login-actions">
                        <span class="login-checkbox">
                            <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                            <label class="choice" for="Field">Recordar conexión</label>
                        </span>
                        <button class="button btn btn-success btn-large" id="btnIngreso">Ingresar</button>
                    </div>
                </form>


            </div> 
            <div id="crear_empresa" title="CREAR EMPRESA" class="">
                <div class="widget-content">
                    <div class="tabbable">
                        <form class="form-horizontal" id="empresa_form" name="clientes_form" method="post">
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label" for="nombre_empresa">Nombre empresa: <font color="red">*</font></label>
                                    <div class="controls">
                                        <input type="text" name="nombre_empresa"  id="nombre_empresa" placeholder="Empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="ruc_empresa">Ruc empresa: <font color="red">*</font></label>
                                    <div class="controls">
                                        <input type="text" name="ruc_empresa"  id="ruc_empresa" placeholder=" Ruc empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="direccion_empresa">Dirección: <font color="red">*</font></label>
                                    <div class="controls">
                                        <input type="text" name="direccion_empresa"  id="direccion_empresa" placeholder="Dirección empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="telefono_empresa">Telefóno: <font color="red">*</font></label>
                                    <div class="controls">
                                        <input type="text" name="telefono_empresa"  id="telefono_empresa" placeholder="Telefóno empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="celular_empresa">Celular: </label>
                                    <div class="controls">
                                        <input type="text" name="celular_empresa"  id="celular_empresa" placeholder="Telefóno empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="fax_empresa">Fax: </label>
                                    <div class="controls">
                                        <input type="text" name="fax_empresa"  id="fax_empresa" placeholder="Fax empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="correo_empresa">E-mail: </label>
                                    <div class="controls">
                                        <input type="text" name="correo_empresa"  id="correo_empresa" placeholder="Correo empresa" required class="campo">
                                    </div>	
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="pagina_empresa">Página Web: </label>
                                    <div class="controls">
                                        <input type="text" name="pagina_empresa"  id="pagina_empresa" placeholder="Página web empresa" required class="campo">
                                    </div>	
                                </div>
                            </fieldset>
                        </form>
                        <div class="form-actions">
                            <button class="btn btn-primary" id='btnGuardar'><i class="icon-save"></i> Guardar</button>
                            <button class="btn btn-primary" id='btnCancelar'><i class="icon-remove-sign"></i> Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>