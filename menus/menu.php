<?php

if (empty($_SESSION['id'])) {
    header('Location: index.php');
}

function menu_1() {
    print(' <ul id="main-menu" class="sm sm-blue">
            <li><a href="" target="_parent">Inicio</a></li>
            <li><a href="" target="_parent">Ingresos</a>
                <ul>
                    <li><a href="" target="_parent">Usuarios</a>
                    <ul>
                            <li><a href="../html/usuarios.php" target="_blank">Crear Usuarios</a></li>
                    </ul>
                    </li>
                    <li><a href="../html/empresa.php" target="_blank">Empresas</a></li>
                    <li><a href="../html/clientes.php" target="_blank">Clientes</a></li>
                    <li><a href="../html/proveedores.php"target="_blank">Proveedores</a></li>
                    <li><a href="">Productos</a>
                        <ul>
                            <li><a href="" target="_parent">Clasificacion</a>
                            <ul>
                                  <li><a href="../html/categorias.php" target="_blank">Categorias</a></li>
                                  <li><a href="../html/marcas.php" target="_blank">Marcas</a></li>
                                  <li><a href="../html/colores.php" target="_blank"">Colores</a></li>
                            </ul>
                            </li>
                            <li><a href="" target="_parent">Ingreso Productos</a>
                            <ul>
                                  <li><a href="../html/productos.php" target="_blank">Bienes</a></li>
                                  <li><a href="../html/servicios.php" target="_blank">Servicios</a></li>
                            </ul>
                           </li>
                        </ul>
                    </li>
                   
                </ul>
            </li>
            <li><a href="" target="_parent">Mantenimiento</a>
                <ul>
                    <li><a href="../html/registroEquipo.php" target="_blank">Registro Equipo</a></li>
                    <li><a href="../html/repacionEquipo.php" target="_blank">Reparación</a></li>
                    <li><a href="../html/entregaEquipos.php" target="_blank">Entrega</a></li>
                    <li><a href="../html/restablecer.php" target="_blank">Restablecer</a></li>
                </ul>
            </li>
            
            <li><a href="" target="_parent">Procesos</a>
                <ul>
                    <li><a href="../html/inventario.php" target="_blank">Inventario</a></li>
                    <li><a href="../html/proformas.php" target="_blank">Proformas</a></li>
                    <li><a href="../html/produccion.php" target="_blank">Ordenes Producción</a></li>
                    <li><a href="" target="_parent">Compras</a>
                        <ul>
                            <li><a href="../html/factura_compra.php" target="_blank">Productos Bodega</a></li>
                            <li><a href="../html/devolucionCompra.php" target="_blank">Devolución Compra</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="../html/factura_venta.php" target="_blank">Ventas facturacion</a></li>
                            <li><a href="../html/notasCredito.php" target="_blank">Notas de crédito</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Transferencias</a>
                        <ul>
                            <li><a href="../html/ingresos.php" target="_blank">Ingresos</a></li>
                            <li><a href="../html/egresos.php" target="_blank">Egresos</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="../html/cuentasCobrar.php" target="_blank">Cuentas por cobrar</a></li>
                            <li><a href="../html/cuentasPagar.php" target="_blank">Cuentas por pagar</a></li>
                            <li><a href="" target="_blank">Externas</a>
                            <ul>
                            <li><a href="../html/CxCexternas.php" target="_blank">Cuentas por cobrar</a></li>
                            <li><a href="../html/CxPexternas.php" target="_blank">Cuentas por pagar</a></li>
                            </ul>
                           </li>
                        </ul>
                    </li>
                    <li><a href="../html/registroGastos.php" target="_blank">Registro Gastos</a></li>
                    <li><a href="../html/gastos.php" target="_blank">Gastos Internos</a></li>
                </ul>
            </li>
            <li><a href="" target="_parent">Reportes</a>
                <ul>
                    <li><a href="#">Productos</a>
                        <ul>
                            <li><a href="" id="producto_general">Lista precios en general</a></li>
                            <li><a href="" id="producto_marca_categoria">Lista precios por Categorias y Marcas</a></li>
                            <li><a href="" id="producto_existencia_minima">Productos existencia mínima</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Compras</a>
                        <ul>
                            
                            <li><a href="">Resumen de compras locales</a>
                               <ul>
                                  <li><a href="" id="agrupados_proveedor">Agrupados por proveedor</a></li>
                                  <li><a href="" id="reporte_factura_compra">Facturas</a></li>
                                  <li><a href="" id="reporte_dev_compras">Devoluciones en compras</a></li>
                                  <li><a href="" id="resumenFacturas">Facturas por proveedor</a></li>
                                  <li><a href="" id="resumenFacturasCompras">Facturas Agrupadas</a></li>
                                  
                               </ul>
                            </li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="" target="_parent">Flujo de caja</a>
                               <ul>
                                  <li><a href="" id="ventaGeneralClientes">Resumen de venta general por clientes</a></li>
                                  <li><a href="" id="ventaGeneral">Resumen de venta general</a></li>
                                  <li><a href="" id="diario_caja">Diario de caja</a></li>
                               </ul>
                            </li>
                            <li><a href="" target="_parent">Resumen de:</a>
                               <ul>
                                  <li><a href="" id="reporte_factura_venta">Facturas y notas de ventas</a></li>
                                  <li><a href="" id="reporte_facturas_notas_anuladas">Facturas y notas de venta anuladas</a></li>
                                  <li><a href="" id="reporte_nota_credito">Notas de crédito (NC)</a></li>
                                  <li><a href="">Facturas y notas de venta por producto</a></li>
                                  <li><a href="" id="reporte_general">General de facturas y notas de venta</a></li>
                               </ul>
                            </li>
                            <li><a href="" id="reporte_utilidad_producto">Utilidad por producto</a></li>
                            <li><a href="" id="reporte_utilidad_factura">Utilidad por factura</a></li>
                            <li><a href="" id="reporte_utilidad_factura_general">Utilidad General de facturas</a></li>
                            <li><a href="" id="buscar_serie">Buscar por nro de serie</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="">Estados de cuentas proveedores locales</a></li>
                            <li><a href="">Estados de cuentas de clientes</a></li>
                            <li><a href="">Cuentas por cobrar</a>
                               <ul>
                                  <li><a href="" id="facturas_canceladas">Listado de facturas canceladas</a></li>
                                  <li><a href="" id="facturas_cobrar_clientes" >Listado de facturas por cobrar</a></li>
                                  <li><a href="" id="cobros_realizados">Cobros realizados</a></li>
                               </ul>
                            </li>
                            
                           <li><a href="" target="_parent">Cuentas por pagar</a>
                               <ul>
                                  <li><a href="" id="facturas_canceladas_proveedor">Listado de facturas canceladas</a></li>
                                  <li><a href="" id="facturas_pagar_proveedor" >Listado de facturas por pagar</a></li>
                                  <li><a href="" id="pagos_realizados">Pagos realizados</a></li>
                               </ul>
                            </li>
                        </ul>
                   </li>
                  <li><a href="#">Proformas</a>
                        <ul>
                            <li><a href="" target="_parent" id="proformas">Proformas</a></li>
                            <li><a href="" id="lista_proformas">Lista de Proformas</a></li>
                        </ul>
                   </li> 
                  <li><a href="#">Mantenimiento</a>
                      <ul>
                          <li><a href="" id="equipos_recibidos">Lista de Registo de Equipos</a></li>
                          <li><a href="" id="equipos_reparados">Lista equipos Reparados</a></li>
                          <li><a href="" id="equipos_en_reparacion">Lista equipos en Reparación</a></li>
                          <li><a href="" id="equipos_entregados">Lista de Equipos Entregados</a></li>
                      </ul>
                  </li>
                  <li><a href="#">Gastos</a>
                      <ul>
                        <li><a href="" id="gastos">Gastos por factura</a></li> 
                        <li><a href="" id="gastos_general">Gastos general</a></li>         
                        <li><a href="" id="gastos_internos">Gastos Internos Fechas</a></li>         
                      </ul>
                  </li> 
                  <li><a href="" id="orden_produccion">Ordenes de Producción</a></li>
                   <li><a href="#">Autorizaciones</a>
                      <ul>
                          <li><a href="" id="autorizaciones_cliente">Autorizaciones CLientes</a></li>
                          <li><a href="" id="autorizaciones_cliente_fechas">Autorizaciones entre fechas</a></li>
                          <li><a href="" id="autorizaciones_cliente_caducidad">Autorizaciones por caducar</a></li>
                      </ul>
                  </li> 
                </ul>
            </li>
            <li><a href="" target="_parent">Bienvenido</a>
                <ul>
                    <li><a href="#" class="disabled">' . $_SESSION['nombres'] . '</a></li>
                    <li><a href="#">Modificar</a></li>
                    <li><a href="../html/index.php">Salir</a></li>
                </ul>
            </li>
            <li><a href="" target="_parent">Ayuda</a>
                <ul class="mega-menu">
                    <li>
                        <!-- The mega drop down contents -->
                        <div style="width:400px;max-width:100%;">
                            <div style="padding:5px 24px;">
                                
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>');
}

function menu_2() {
     print(' <ul id="main-menu" class="sm sm-blue">
            <li><a href="" target="_parent">Inicio</a></li>
            <li><a href="" target="_parent">Ingresos</a>
                <ul>
                    <li><a href="" target="_parent">Usuarios</a>
                    <ul>
                            <li><a href="../html/usuarios.php" target="_blank">Crear Usuarios</a></li>
                            <li><a href="../html/permisos.php" target="_blank">Permisos</a></li>
                    </ul>
                    </li>
                    <li><a href="../html/clientes.php" target="_blank">Clientes</a></li>
                    <li><a href="../html/proveedores.php"target="_blank">Proveedores</a></li>
                    <li><a href="">Productos</a>
                        <ul>
                            <li><a href="" target="_parent">Clasificacion</a>
                            <ul>
                                  <li><a href="../html/categorias.php" target="_blank">Categorias</a></li>
                                  <li><a href="../html/marcas.php" target="_blank">Marcas</a></li>
                                  <li><a href="../html/colores.php" target="_blank"">Colores</a></li>
                            </ul>
                            </li>
                            <li><a href="" target="_parent">Ingreso Productos</a>
                            <ul>
                                  <li><a href="../html/productos.php" target="_blank">Bienes</a></li>
                                  <li><a href="../html/servicios.php" target="_blank">Servicios</a></li>
                            </ul>
                           </li>
                        </ul>
                    </li>
                   
                </ul>
            </li>
            <li><a href="" target="_parent">Mantenimiento</a>
                <ul>
                    <li><a href="../html/registroEquipo.php" target="_blank">Registro Equipo</a></li>
                    <li><a href="../html/repacionEquipo.php" target="_blank">Reparación</a></li>
                    <li><a href="../html/entregaEquipos.php" target="_blank">Entrega</a></li>
                    <li><a href="../html/restablecer.php" target="_blank">Restablecer</a></li>
                    <li><a href="">Estado Equipos</a>
                        <ul>
                            <li><a href="../html/reparacionInterna.php" target="_blank">Reparación Interna</a></li>
                            <li><a href="../html/reparacionExterna.php" target="_blank">Reparación Externa</a></li>
                        </ul>
                  </li>
                </ul>
            </li>
            
            <li><a href="" target="_parent">Procesos</a>
                <ul>
                    <li><a href="../html/inventario.php" target="_blank">Inventario</a></li>
                    <li><a href="../html/proformas.php" target="_blank">Proformas</a></li>
                    <li><a href="../html/produccion.php" target="_blank">Ordenes Producción</a></li>
                    <li><a href="" target="_parent">Compras</a>
                        <ul>
                            <li><a href="../html/factura_compra.php" target="_blank">Productos Bodega</a></li>
                            <li><a href="../html/registroGastos.php" target="_blank">Registro Gastos</a></li>
                            <li><a href="../html/devolucionCompra.php" target="_blank">Devolución Compra</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="../html/factura_venta.php" target="_blank">Ventas facturacion</a></li>
                            <li><a href="../html/notasCredito.php" target="_blank">Notas de crédito</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Transferencias</a>
                        <ul>
                            <li><a href="../html/ingresos.php" target="_blank">Ingresos</a></li>
                            <li><a href="../html/egresos.php" target="_blank">Egresos</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="../html/cuentasCobrar.php" target="_blank">Cuentas por cobrar</a></li>
                            <li><a href="../html/cuentasPagar.php" target="_blank">Cuentas por pagar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="" target="_parent">Reportes</a>
                <ul>
                    <li><a href="#">Productos</a>
                        <ul>
                            <li><a href="" id="producto_general">Lista precios en general</a></li>
                            <li><a href="" id="producto_marca_categoria">Lista precios por Categorias y Marcas</a></li>
                            <li><a href="" id="producto_existencia_minima">Productos existencia mínima</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Compras</a>
                        <ul>
                            
                            <li><a href="">Resumen de compras locales</a>
                               <ul>
                                  <li><a href="" id="agrupados_proveedor">Agrupados por proveedor</a></li>
                                  <li><a href="" id="reporte_factura_compra">Facturas</a></li>
                                  <li><a href="">Devoluciones en compras</a></li>
                                  <li><a href="">IVA en compras</a></li>
                                  <li><a href="">Por tipo de comprobante</a></li>
                                  
                               </ul>
                            </li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="" target="_parent">Flujo de caja</a>
                               <ul>
                                  <li><a href="">Resumen de venta general</a></li>
                               </ul>
                            </li>
                            <li><a href="" target="_parent">Productos más vendidos</a></li>
                            <li><a href="" target="_parent">Resumen de:</a>
                               <ul>
                                  <li><a href="" id="reporte_factura_venta">Facturas y notas de ventas</a></li>
                                  <li><a href="">Facturas y notas de venta anuladas</a></li>
                                  <li><a href="">Notas de crédito (NC)</a></li>
                                  <li><a href="">Facturas y notas de venta por producto</a></li>
                                  <li><a href="">General de facturas y notas de venta</a></li>
                                  <li><a href="">Agrupados por cliente</a></li>
                                  <li><a href="">Facturas por proveedor, vendedor</a></li>
                                  <li><a href="">Ventas agrupados por su clasificación</a></li>
                                  <li><a href="">Reservaciones</a></li>
                               </ul>
                            </li>
                            <li><a href="#">Utilidad por producto</a></li>
                            <li><a href="#">Productos mas comprados por cliente</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="">Estados de cuentas proveedores locales</a></li>
                            <li><a href="">Estados de cuentas de clientes</a></li>
                            <li><a href="">Cuentas por cobrar</a>
                               <ul>
                                  <li><a href="">Listado de facturas canceladas</a></li>
                                  <li><a href="">Listado de facturas por cobrar</a></li>
                                  <li><a href="">Cobros realizados</a></li>
                               </ul>
                            </li>
                            
                           <li><a href="" target="_parent">Cuentas por pagar</a>
                               <ul>
                                  <li><a href="">Listado de facturas canceladas</a></li>
                                  <li><a href="">Listado de facturas por pagar</a></li>
                                  <li><a href="">Pagos realizados</a></li>
                               </ul>
                            </li>
                        </ul>
                   </li>
                   
                  <li><a href="" target="_parent">Proformas</a></li>
                   
                </ul>
            </li>
            <li><a href="" target="_parent">Bienvenido</a>
                <ul>
                    <li><a href="#" class="disabled">' . $_SESSION['nombres'] . '</a></li>
                    <li><a href="#">Modificar</a></li>
                    <li><a href="../html/index.php">Salir</a></li>
                </ul>
            </li>
            <li><a href="" target="_parent">Ayuda</a>
                <ul class="mega-menu">
                    <li>
                        <!-- The mega drop down contents -->
                        <div style="width:400px;max-width:100%;">
                            <div style="padding:5px 24px;">
                                <p>This is a mega drop down test. Just set the "mega-menu" class to the parent UL element to inform the SmartMenus script. It can contain <strong>any HTML</strong>.</p>
                                <p>Just style the contents as you like (you may need to reset some SmartMenus inherited styles - e.g. for lists, links, etc.)</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>');
}

function menu_3() {
     print(' <ul id="main-menu" class="sm sm-blue">
            <li><a href="" target="_parent">Inicio</a></li>
            <li><a href="" target="_parent">Ingresos</a>
                <ul>
                    <li><a href="" target="_parent">Usuarios</a>
                    <ul>
                            <li><a href="../html/usuarios.php" target="_blank">Crear Usuarios</a></li>
                            <li><a href="../html/permisos.php" target="_blank">Permisos</a></li>
                    </ul>
                    </li>
                    <li><a href="../html/clientes.php" target="_blank">Clientes</a></li>
                    <li><a href="../html/proveedores.php"target="_blank">Proveedores</a></li>
                    <li><a href="">Productos</a>
                        <ul>
                            <li><a href="" target="_parent">Clasificacion</a>
                            <ul>
                                  <li><a href="../html/categorias.php" target="_blank">Categorias</a></li>
                                  <li><a href="../html/marcas.php" target="_blank">Marcas</a></li>
                                  <li><a href="../html/colores.php" target="_blank"">Colores</a></li>
                            </ul>
                            </li>
                            <li><a href="" target="_parent">Ingreso Productos</a>
                            <ul>
                                  <li><a href="../html/productos.php" target="_blank">Bienes</a></li>
                                  <li><a href="../html/servicios.php" target="_blank">Servicios</a></li>
                            </ul>
                           </li>
                        </ul>
                    </li>
                   
                </ul>
            </li>
            <li><a href="" target="_parent">Mantenimiento</a>
                <ul>
                    <li><a href="../html/registroEquipo.php" target="_blank">Registro Equipo</a></li>
                    <li><a href="../html/repacionEquipo.php" target="_blank">Reparación</a></li>
                    <li><a href="../html/entregaEquipos.php" target="_blank">Entrega</a></li>
                    <li><a href="../html/restablecer.php" target="_blank">Restablecer</a></li>
                    <li><a href="">Estado Equipos</a>
                        <ul>
                            <li><a href="../html/reparacionInterna.php" target="_blank">Reparación Interna</a></li>
                            <li><a href="../html/reparacionExterna.php" target="_blank">Reparación Externa</a></li>
                        </ul>
                  </li>
                </ul>
            </li>
            
            <li><a href="" target="_parent">Procesos</a>
                <ul>
                    <li><a href="../html/inventario.php" target="_blank">Inventario</a></li>
                    <li><a href="../html/proformas.php" target="_blank">Proformas</a></li>
                    <li><a href="../html/produccion.php" target="_blank">Ordenes Producción</a></li>
                    <li><a href="" target="_parent">Compras</a>
                        <ul>
                            <li><a href="../html/factura_compra.php" target="_blank">Productos Bodega</a></li>
                            <li><a href="../html/registroGastos.php" target="_blank">Registro Gastos</a></li>
                            <li><a href="../html/devolucionCompra.php" target="_blank">Devolución Compra</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="../html/factura_venta.php" target="_blank">Ventas facturacion</a></li>
                            <li><a href="../html/notasCredito.php" target="_blank">Notas de crédito</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Transferencias</a>
                        <ul>
                            <li><a href="../html/ingresos.php" target="_blank">Ingresos</a></li>
                            <li><a href="../html/egresos.php" target="_blank">Egresos</a></li>
                        </ul>
                    </li>
                    <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="../html/cuentasCobrar.php" target="_blank">Cuentas por cobrar</a></li>
                            <li><a href="../html/cuentasPagar.php" target="_blank">Cuentas por pagar</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="" target="_parent">Reportes</a>
                <ul>
                    <li><a href="#">Productos</a>
                        <ul>
                            <li><a href="" id="producto_general">Lista precios en general</a></li>
                            <li><a href="" id="producto_marca_categoria">Lista precios por Categorias y Marcas</a></li>
                            <li><a href="" id="producto_existencia_minima">Productos existencia mínima</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Compras</a>
                        <ul>
                            
                            <li><a href="">Resumen de compras locales</a>
                               <ul>
                                  <li><a href="" id="agrupados_proveedor">Agrupados por proveedor</a></li>
                                  <li><a href="" id="reporte_factura_compra">Facturas</a></li>
                                  <li><a href="">Devoluciones en compras</a></li>
                                  <li><a href="">IVA en compras</a></li>
                                  <li><a href="">Por tipo de comprobante</a></li>
                                  
                               </ul>
                            </li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Ventas</a>
                        <ul>
                            <li><a href="" target="_parent">Flujo de caja</a>
                               <ul>
                                  <li><a href="">Resumen de venta general</a></li>
                               </ul>
                            </li>
                            <li><a href="" target="_parent">Productos más vendidos</a></li>
                            <li><a href="" target="_parent">Resumen de:</a>
                               <ul>
                                  <li><a href="" id="reporte_factura_venta">Facturas y notas de ventas</a></li>
                                  <li><a href="">Facturas y notas de venta anuladas</a></li>
                                  <li><a href="">Notas de crédito (NC)</a></li>
                                  <li><a href="">Facturas y notas de venta por producto</a></li>
                                  <li><a href="">General de facturas y notas de venta</a></li>
                                  <li><a href="">Agrupados por cliente</a></li>
                                  <li><a href="">Facturas por proveedor, vendedor</a></li>
                                  <li><a href="">Ventas agrupados por su clasificación</a></li>
                                  <li><a href="">Reservaciones</a></li>
                               </ul>
                            </li>
                            <li><a href="#">Utilidad por producto</a></li>
                            <li><a href="#">Productos mas comprados por cliente</a></li>
                        </ul>
                   </li>
                   
                   <li><a href="" target="_parent">Cartera</a>
                        <ul>
                            <li><a href="">Estados de cuentas proveedores locales</a></li>
                            <li><a href="">Estados de cuentas de clientes</a></li>
                            <li><a href="">Cuentas por cobrar</a>
                               <ul>
                                  <li><a href="">Listado de facturas canceladas</a></li>
                                  <li><a href="">Listado de facturas por cobrar</a></li>
                                  <li><a href="">Cobros realizados</a></li>
                               </ul>
                            </li>
                            
                           <li><a href="" target="_parent">Cuentas por pagar</a>
                               <ul>
                                  <li><a href="">Listado de facturas canceladas</a></li>
                                  <li><a href="">Listado de facturas por pagar</a></li>
                                  <li><a href="">Pagos realizados</a></li>
                               </ul>
                            </li>
                        </ul>
                   </li>
                   
                  <li><a href="" target="_parent">Proformas</a></li>
                   
                </ul>
            </li>
            <li><a href="" target="_parent">Bienvenido</a>
                <ul>
                    <li><a href="#" class="disabled">' . $_SESSION['nombres'] . '</a></li>
                    <li><a href="#">Modificar</a></li>
                    <li><a href="../html/index.php">Salir</a></li>
                </ul>
            </li>
            <li><a href="" target="_parent">Ayuda</a>
                <ul class="mega-menu">
                    <li>
                        <!-- The mega drop down contents -->
                        <div style="width:400px;max-width:100%;">
                            <div style="padding:5px 24px;">
                                <p>This is a mega drop down test. Just set the "mega-menu" class to the parent UL element to inform the SmartMenus script. It can contain <strong>any HTML</strong>.</p>
                                <p>Just style the contents as you like (you may need to reset some SmartMenus inherited styles - e.g. for lists, links, etc.)</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>');
}
?>


