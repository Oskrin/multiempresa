$(document).on("ready", inicio);

function evento(e) {
    e.preventDefault();
}

$(function() {
    $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});

function scrollToBottom() {
    $('html, body').animate({
        scrollTop: $(document).height()
    }, 'slow');
}

function scrollToTop() {
    $('html, body').animate({
        scrollTop: 0
    }, 'slow');
}

function show() {
    var Digital = new Date();
    var hours = Digital.getHours();
    var minutes = Digital.getMinutes();
    var seconds = Digital.getSeconds();
    var dn = "AM";
    if (hours > 12) {
        dn = "PM";
        hours = hours - 12;
    }
    if (hours === 0)
        hours = 12;
    if (minutes <= 9)
        minutes = "0" + minutes;
    if (seconds <= 9)
        seconds = "0" + seconds;
    $("#hora_actual").val(hours + ":" + minutes + ":" + seconds + " " + dn);

    setTimeout("show()", 1000);
}

var dialogo =
{
    autoOpen: false,
    resizable: false,
    width: 350,
    height: 200,
    modal: true
};

var dialogo2 =
{
    autoOpen: false,
    resizable: false,
    width: 830,
    height: 350,
    modal: true,
    position: "top",
    show: "explode",
    hide: "blind"    
}

var dialogo3 =
{
    autoOpen: false,
    resizable: false,
    width: 400,
    height: 210,
    modal: true,
    position: "top",
    show: "explode",
    hide: "blind"    
}

var dialogo4 ={
    autoOpen: false,
    resizable: false,
    width: 225,
    height: 150,
    modal: true,
    position: "top",
    show: "explode",
    hide: "blind"
    
}

function ValidNum(e) {
    if (e.keyCode < 48 || e.keyCode > 57) {
        e.returnValue = false;
    }
    return true;
}

function guardar_factura() {
    var tam = jQuery("#list").jqGrid("getRowData");

    if ($("#num_factura").val() === "") {
        $("#num_factura").focus();
        alert("Indique número de la factura");
    } else {
        var num_factu = ("001" + "-" + "001" + "-" + $("#num_factura").val());
        
        $.ajax({
            type: "POST",
            url: "../procesos/comparar_num_venta.php",
            data: "num_fac=" + num_factu,
            success: function(data) {
                var val = data;
                if (val == 1)
                {
                    alert("Error... El número de factura ya existe");
                    $("#num_factura").val("");
                    $("#num_factura").focus();
                }else{
                    if ($("#ruc_ci").val() === "") {
                        $("#ruc_ci").focus();
                        alert("Indique un cliente");
                    } else {
                        if ($("#ruc_ci").val().length !== 10 && $("#ruc_ci").val().length !== 13) {
                            alert("Error... Ingrese una Identificación valida");
                            $("#ruc_ci").val("");
                            $("#ruc_ci").focus();
                        } else{
                            if ($("#nombre_cliente").val() === "") {
                                $("#nombre_cliente").focus();
                                alert("Nombres del cliente");
                            }else{
                                if ($("#direccion_cliente").val() === "") {
                                    $("#direccion_cliente").focus();
                                    alert("Dirección del cliente");
                                }else{
                                    if ($("#saldo").val() === "") {
                                        $("#saldo").focus();
                                        alert("Indique un saldo");
                                    } else {
                                        if ($("#tipo_precio").val() === "") {
                                            alert("Seleccione un tipo de precio");
                                            $("#tipo_precio").focus();
                                        } else {
                                            if (tam.length === 0) {
                                                alert("Error... Llene productos a la factura");
                                            } else {
                                                if ($("#formas").val() === "Credito" && $("#meses").val() === "") {
                                                    $("#meses").focus();
                                                    alert("Meses a diferir");
                                                } else {
                                                    var v1 = new Array();
                                                    var v2 = new Array();
                                                    var v3 = new Array();
                                                    var v4 = new Array();
                                                    var v5 = new Array();
                                                    var v6 = new Array();
                                                    var string_v1 = "";
                                                    var string_v2 = "";
                                                    var string_v3 = "";
                                                    var string_v4 = "";
                                                    var string_v5 = "";
                                                    var string_v6 = "";
                                                    var fil = jQuery("#list").jqGrid("getRowData");
                                                    for (var i = 0; i < fil.length; i++) {
                                                        var datos = fil[i];
                                                        v1[i] = datos['cod_producto'];
                                                        v2[i] = datos['cantidad'];
                                                        v3[i] = datos['precio_u'];
                                                        v4[i] = datos['descuento'];
                                                        v5[i] = datos['total'];
                                                        v6[i] = datos['pendiente'];
                                                    }
                                                    for (i = 0; i < fil.length; i++) {
                                                        string_v1 = string_v1 + "|" + v1[i];
                                                        string_v2 = string_v2 + "|" + v2[i];
                                                        string_v3 = string_v3 + "|" + v3[i];
                                                        string_v4 = string_v4 + "|" + v4[i];
                                                        string_v5 = string_v5 + "|" + v5[i];
                                                        string_v6 = string_v6 + "|" + v6[i];
                                                    }
                                                    
                                                    var seriee = ("001" + "-" + "001" + "-" + $("#num_factura").val());
                                                    $.ajax({
                                                        type: "POST",
                                                        url: "../procesos/guardar_factura_venta.php",
                                                        data: "id_cliente=" + $("#id_cliente").val() + "&comprobante=" + $("#comprobante").val() + "&num_factura=" + seriee + "&fecha_actual=" + $("#fecha_actual").val() + "&hora_actual=" + $("#hora_actual").val() + "&proforma=" + $("#proforma").val() + "&cancelacion=" + $("#cancelacion").val() + "&tipo_precio=" + $("#tipo_precio").val() + "&formas=" + $("#formas").val() + "&adelanto=" + $("#adelanto").val() + "&meses=" + $("#meses").val() + "&autorizacion=" + $("#autorizacion").val()+ "&fecha_auto=" + $("#fecha_auto").val()+ "&fecha_caducidad=" + $("#fecha_caducidad").val() + "&tarifa0=" + $("#total_p").val() + "&tarifa12=" + $("#total_p2").val() + "&iva=" + $("#iva").val() + "&desc=" + $("#desc").val() + "&tot=" + $("#tot").val() + "&ruc_ci=" + $("#ruc_ci").val() + "&nombre_cliente=" + $("#nombre_cliente").val() + "&direccion_cliente=" + $("#direccion_cliente").val() + "&telefono_cliente=" + $("#telefono_cliente").val() + "&saldo=" + $("#saldo").val() + "&campo1=" + string_v1 + "&campo2=" + string_v2 + "&campo3=" + string_v3 + "&campo4=" + string_v4 + "&campo5=" + string_v5+ "&campo6=" + string_v6,
                                                        success: function(data) {
                                                            val = data;
                                                            if (val == 1)
                                                            {
                                                                window.open("../reportes_sistema/factura_venta.php?hoja=A4&id="+$("#comprobante").val(),'_blank');
                                                                alert("Factura Guardada correctamente");
                                                                location.reload();
                                                            }
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        } 
                    } 
                }
            }
        });
    }
}

function limpiar_factura(){
    location.reload(); 
}

function inicio() { 
    
    //////////////para hora///////////
    show();
    ///////////////////
    //
    /////////////////SPINNER//////////
    $("#descuento").spinner({
        min: 0, 
        max: 0
    });
    ///////////////////////////////////

    ///////botones /////////////////// 
    $("#btncargar").click(function(e) {
        e.preventDefault();
    });
    $("#btnAgregar").click(function(e) {
        e.preventDefault();
    });
    $("#btnGuardarSeries").click(function(e) {
        e.preventDefault();
    });
    $("#btnGuardar").click(function(e) {
        e.preventDefault();
    });
    $("#btnModificar").click(function(e) {
        e.preventDefault();
    });
    $("#btnImprimir").click(function (){        
        window.open("../reportes_sistema/factura_venta.php?hoja=A4&id="+$("#comprobante").val(),'_blank');
    });
    $("#btnNuevo").click(function(e) {
        e.preventDefault();
    });
    $("#btnAnular").click(function(e) {
        e.preventDefault();
    });
    $("#btnAceptar").click(function(e) {
        e.preventDefault();
    });
    $("#btnSalir").click(function(e) {
        e.preventDefault();
    });
    $("#btnAcceder").click(function(e) {
        e.preventDefault();
    });
    $("#btnCancelar").click(function(e) {
        e.preventDefault();
    });
    $("#btnImprimir").click(function(e) {
        e.preventDefault();
    });
    $("#btnAtras").click(function(e) {
        e.preventDefault();
    });
    $("#btnAdelante").click(function(e) {
        e.preventDefault();
    });

    $("#btnGuardar").on("click", guardar_factura);
    $("#btnAceptar").click(function (){
        var id = jQuery("#list2").jqGrid('getGridParam', 'selrow');
        jQuery('#list2').jqGrid('restoreRow', id);
        var ret = jQuery("#list2").jqGrid('getRowData', id);
        crear_gasto(ret.id_factura_venta, ret.total_gasto, ret.total_venta);
    });
    
    $("#ingreso_gastos").dialog(dialogo);
    $("#buscar_facturas_venta").dialog(dialogo2);

    $("#btnBuscar").click(function (){
        $("#buscar_facturas_venta").dialog("open");   
    })
      
    $("#valor").keypress(function(e) {
        var key;
        if (window.event)
        {
            key = e.keyCode;
        }
        else if (e.which)
        {
            key = e.which;
        }

        if (key < 48 || key > 57)
        {
            if (key === 46 || key === 8)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        return true;
    });
    
    //////////////para precio////////
    $("#precio").keypress(function(e) {
        var key;
        if (window.event)
        {
            key = e.keyCode;
        }
        else if (e.which)
        {
            key = e.which;
        }

        if (key < 48 || key > 57)
        {
            if (key === 46 || key === 8)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        return true;
    });
    ////////////////////////////////
   

    ///////////calendarios////////////
    $("#fecha_actual").datepicker({
        dateFormat: 'yy-mm-dd'
    });

////////////////////buscador facturas ventas/////////////////////////
        jQuery("#list2").jqGrid({
        url: '../xml/xmlBuscarFacturaVenta2.php',
        datatype: 'xml',
        colNames: ['ID','IDENTIFICACIÓN','CLIENTE', 'FACTURA NRO.','FECHA','MONTO TOTAL','SALDO RESTANTE'],
        colModel: [
            {name: 'id_factura_venta', index: 'id_factura_venta', editable: false, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 50},
            {name: 'identificacion', index: 'identificacion', editable: false, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 150},
            {name: 'nombres_cli', index: 'nombres_cli', editable: true, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 200},
            {name: 'num_factura', index: 'num_factura', editable: true, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 200},
            {name: 'fecha_actual', index: 'fecha_actual', editable: true, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 100},
            {name: 'total_venta', index: 'total_venta', editable: true, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 120},
            {name: 'total_gasto', index: 'total_gasto', editable: true, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 140}
        ],
        rowNum: 30,
        width: 800,
        height:220,
        sortable: true,
        rowList: [10, 20, 30],
        pager: jQuery('#pager2'),
        sortname: 'id_factura_venta',
        sortorder: 'asc',
        viewrecords: true,              
        ondblClickRow: function(){
        var id = jQuery("#list2").jqGrid('getGridParam', 'selrow');
        jQuery('#list2').jqGrid('restoreRow', id);
        var ret = jQuery("#list2").jqGrid('getRowData', id); 
        
        if(parseFloat(ret.total_gasto) <= parseFloat(0.00)){
           alert("Factura al limite");   
        }else{
            $("#ingreso_gastos").dialog("open"); 
            
        }
    }
        }).jqGrid('navGrid', '#pager2',
        {
            add: false,
            edit: false,
            del: false,
            refresh: true,
            search: true,
            view: true
        },{
            recreateForm: true, closeAfterEdit: true, checkOnUpdate: true, reloadAfterSubmit: true, closeOnEscape: true
        },
        {
            reloadAfterSubmit: true, closeAfterAdd: true, checkOnUpdate: true, closeOnEscape: true,
            bottominfo: "Todos los campos son obligatorios son obligatorios"
        },
        {
            width: 300, closeOnEscape: true
        },
        {
            closeOnEscape: true,        
            multipleSearch: false, overlay: false
        },
        {
        },
        {
            closeOnEscape: true
        });
        
       jQuery("#list2").jqGrid('navButtonAdd', '#pager2', {caption: "Añadir",
       onClickButton: function() {
        var id = jQuery("#list2").jqGrid('getGridParam', 'selrow');
        jQuery('#list2').jqGrid('restoreRow', id);
        if (id) {
           var ret = jQuery("#list2").jqGrid('getRowData', id);
 
           if(parseFloat(ret.total_gasto) <= parseFloat(0.00)){
           alert("Factura al limite");   
            }else{
                $("#ingreso_gastos").dialog("open"); 
            }
        }
        else {
            alert("Seleccione una cuenta");
        }
    }
});

}


function crear_gasto(id_factura, total_gasto, total_venta ){

    if($("#descripcion").val() == ""){
        alert("Ingrese la descripción");
        $("#descripcion").focus();
    }else{
        if($("#valor").val() == ""){
            alert("Ingrese el valor");
            $("#valor").focus();
        } else{
            if(parseFloat($("#valor").val()) > parseFloat(total_gasto)){
                alert("Error... El valor excede al saldo disponible");
            }else{
                ///////////////guardar gastos///////////////////
                $.ajax({
                    type: "POST",
                    url: "../procesos/guardar_gastos.php",
                    data: "id_factura_venta=" + id_factura + "&comprobante=" + $("#comprobante").val() + "&fecha_actual=" + $("#fecha_actual").val() + "&hora_actual=" + $("#hora_actual").val() + "&descripcion=" + $("#descripcion").val() + "&valor=" + $("#valor").val() + "&saldo=" + total_venta,
                    success: function(data) {
                        var val = data;
                        if (val == 1)
                        {
                            alert("Gasto Agragado");
                            $("#ingreso_gastos").dialog("close");
                            $("#buscar_facturas_venta").dialog("close");
                        }
                    }
                }); 
                ///////////////////////////////////////////////
        
                //////////recuperar gastos/////////////////////    
                $.ajax({
                    type: "POST",
                    url: "../procesos/buscar_gastos.php",	
                    data: "id="+id_factura,
                    dataType: 'json',
                    success: function(response) {
                        $("#tablaNuevo").css('display','inline-table');
                        $("#tablaNuevo tbody").empty(); 
                        for (var i = 0; i < response.length; i=i+9) {
                            $("#tablaNuevo tbody").append( "<tr>" +
                                "<td align=center >" + response[i+1] + "</td>" +
                                "<td align=center>" + response[i+2] + "</td>" +	            
                                "<td align=center>" + response[i+3] + "</td>" + 
                                "<td align=center>" + response[i+4] + "</td>" + 
                                "<td align=center>" + response[i+5] + "</td>" + 
                                "<td align=center>" + response[i+6] + "</td>" + 
                                "<td align=center>" + response[i+7] + "</td>" + 
                                "<td align=center>" + response[i+8] + "</td>" +
                                "<tr>");                    
                        }
                        $("#descripcion").val("");
                        $("#valor").val("");
                        $("#list2").trigger('reloadGrid');

                    }                    
                });
            }
        }
    }
}



