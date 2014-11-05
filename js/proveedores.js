$(document).on("ready", inicio);
function evento(e) {
    e.preventDefault();
}

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

$(function() {
    $('#main-menu').smartmenus({
        subMenusSubOffsetX: 1,
        subMenusSubOffsetY: -8
    });
});

var dialogo =
{
    autoOpen: false,
    resizable: false,
    width: 860,
    height: 350,
    modal: true
};

function abrirDialogo(e)
{
    $("#proveedores").dialog("open");
}

function guardar_proveedor(e) {
    var repe = 0;
    var iden = $("#ruc_ci").val();
    if ($("#tipo_docu").val() === "")
    {
        $("#tipo_docu").focus();
        alert("Seleccione un tipo de documento ");
        repe = 1;
    } else {
        if ($("#tipo_docu").val() === "Cedula" && iden.length < 10) {
            $("#ruc_ci").focus();
            alert("Error.. Minimo 10 digitos ");
            repe = 1;
        } else {
            if ($("#tipo_docu").val() === "Ruc" && iden.length < 13) {
                $("#ruc_ci").focus();
                alert("Error.. Minimo 13 digitos ");
                repe = 1;
            } else {
                if ($("#empresa_pro").val() === "") {
                    $("#empresa_pro").focus();
                    alert("Indique nombre de la empresa");
                    repe = 1;
                } else {
                    if ($("#direccion_pro").val() === "") {
                        $("#direccion_pro").focus();
                        alert("Indique la dirección");
                        repe = 1;
                    } else {
                        if ($("#nro_telefono").val() === "") {
                            $("#nro_telefono").focus();
                            alert("Indique número telefónico");
                            repe = 1;
                        } else {
                            if ($("#correo").val() === "") {
                                $("#correo").focus();
                                alert("Ingrese el correo");
                                repe = 1;
                            } else {
                                if ($("#pais_pro").val() === "") {
                                    $("#pais_pro").focus();
                                    alert("Ingrese el pais");
                                    repe = 1;
                                } else {
                                    if ($("#ciudad_pro").val() === "") {
                                        $("#ciudad_pro").focus();
                                        alert("Ingrese la ciudad");
                                        repe = 1;
                                    } else {
                                        if ($("#forma_pago").val() === "") {
                                            $("#forma_pago").focus();
                                            alert("Seleccione forma de pago");
                                            repe = 1;
                                        } else {
                                            if ($("#principal_pro").val() === "") {
                                                $("#principal_pro").focus();
                                                alert("Seleccione un tipo");
                                                repe = 1;
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
    }

    if (repe === 0) {
        $.ajax({
            type: "POST",
            url: "../procesos/guardar_proveedores.php",
            data: "tipo_docu=" + $("#tipo_docu").val() + "&ruc_ci=" + $("#ruc_ci").val() +
            "&empresa_pro=" + $("#empresa_pro").val() + "&representante_legal=" + $("#representante_legal").val()
            + "&visitador=" + $("#visitador").val() + "&direccion_pro=" + $("#direccion_pro").val() + "&nro_telefono=" + $("#nro_telefono").val() + "&nro_celular=" + $("#nro_celular").val() + "&fax=" + $("#fax").val() + "&pais_pro=" + $("#pais_pro").val() + "&ciudad_pro=" + $("#ciudad_pro").val() + "&forma_pago=" + $("#forma_pago").val() + "&correo=" + $("#correo").val() + "&principal_pro=" + $("#principal_pro").val() + "&observaciones_pro=" + $("#observaciones_pro").val(),
            success: function(data) {
                val = data;
                if (val == 1)
                {
                    alert("Datos Guardados Correctamente");
                    location.reload();
                }
            }
        });
    }
}

function modificar_proveedor(e) {
    var repe = 0;
    var iden = $("#ruc_ci").val();
    if ($("#id_proveedor").val() === "")
    {
        alert("Seleccione un proveedor");
        repe = 1;
    } else {
        if ($("#tipo_docu").val() === "")
        {
            $("#tipo_docu").focus();
            alert("Seleccione un tipo de documento ");
            repe = 1;
        } else {
            if ($("#tipo_docu").val() === "Cedula" && iden.length < 10) {
                $("#ruc_ci").focus();
                alert("Error.. Minimo 10 digitos ");
                repe = 1;
            } else {
                if ($("#tipo_docu").val() === "Ruc" && iden.length < 13) {
                    $("#ruc_ci").focus();
                    alert("Error.. Minimo 13 digitos ");
                    repe = 1;
                } else {
                    if ($("#empresa_pro").val() === "") {
                        $("#empresa_pro").focus();
                        alert("Indique nombre de la empresa");
                        repe = 1;
                    } else {
                        if ($("#direccion_pro").val() === "") {
                            $("#direccion_pro").focus();
                            alert("Indique la dirección");
                            repe = 1;
                        } else {
                            if ($("#nro_telefono").val() === "") {
                                $("#nro_telefono").focus();
                                alert("Indique número telefónico");
                                repe = 1;
                            } else {
                                if ($("#correo").val() === "") {
                                    $("#correo").focus();
                                    alert("Ingrese el correo");
                                    repe = 1;
                                } else {
                                    if ($("#pais_pro").val() === "") {
                                        $("#pais_pro").focus();
                                        alert("Ingrese el pais");
                                        repe = 1;
                                    } else {
                                        if ($("#ciudad_pro").val() === "") {
                                            $("#ciudad_pro").focus();
                                            alert("Ingrese la ciudad");
                                            repe = 1;
                                        } else {
                                            if ($("#forma_pago").val() === "") {
                                                $("#forma_pago").focus();
                                                alert("Seleccione forma de pago");
                                                repe = 1;
                                            } else {
                                                if ($("#principal_pro").val() === "") {
                                                    $("#principal_pro").focus();
                                                    alert("Seleccione un tipo");
                                                    repe = 1;
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
        }
    }

    if (repe === 0) {
        $.ajax({
            type: "POST",
            url: "../procesos/modificar_proveedores.php",
            data: "tipo_docu=" + $("#tipo_docu").val() + "&ruc_ci=" + $("#ruc_ci").val() + "&id_proveedor=" + $("#id_proveedor").val() +
            "&empresa_pro=" + $("#empresa_pro").val() + "&representante_legal=" + $("#representante_legal").val()
            + "&visitador=" + $("#visitador").val() + "&direccion_pro=" + $("#direccion_pro").val() + "&nro_telefono=" + $("#nro_telefono").val() + "&nro_celular=" + $("#nro_celular").val() + "&fax=" + $("#fax").val() + "&pais_pro=" + $("#pais_pro").val() + "&ciudad_pro=" + $("#ciudad_pro").val() + "&forma_pago=" + $("#forma_pago").val() + "&correo=" + $("#correo").val() + "&principal_pro=" + $("#principal_pro").val() + "&observaciones_pro=" + $("#observaciones_pro").val(),
            success: function(data) {
                val = data;
                if (val == 1)
                {
                    alert("Datos Modificados Correctamente");
                    location.reload();
                }
            }
        });
    }
}

function nuevo_proveedor(e) {
    location.reload();
}

function ValidNum() {
    if (event.keyCode < 48 || event.keyCode > 57) {
        event.returnValue = false;
    }
    return true;
}

function Num_Let() {
    if ((event.keyCode !== 32) && (event.keyCode < 65) || (event.keyCode > 90) && (event.keyCode < 97) || (event.keyCode > 122)) {
        event.returnValue = false;
    }
    return true;
}

function inicio() {
    $("#nro_telefono").validCampoFranz("0123456789");
    $("#nro_celular").validCampoFranz("0123456789");

    //////////atributos////////////
    $("#ruc_ci").attr("disabled", "disabled");
    ///////tipo pago//////////////

    $("#tipo_docu").change(function() {
        if ($("#tipo_docu").val() === "Cedula") {
            $("#ruc_ci").val("");
            $("#ruc_ci").keypress(ValidNum);
            $("#ruc_ci").removeAttr("disabled");
            $("#ruc_ci").attr("maxlength", "10");

        } else {
            if ($("#tipo_docu").val() === "Ruc") {
                $("#ruc_ci").val("");
                $("#ruc_ci").keypress(ValidNum);
                $("#ruc_ci").removeAttr("disabled");
                $("#ruc_ci").removeAttr("maxlength");
                $("#ruc_ci").attr("maxlength", "13");
            } else {
                if ($("#tipo_docu").val() === "Pasaporte") {
                    $("#ruc_ci").val("");
                    $("#ruc_ci").unbind("keypress");
                    $("#ruc_ci").removeAttr("disabled");
                    $("#ruc_ci").attr("maxlength", "30");

                }
            }

        }
    });
    /////////////////////////////

    //////para validar cedula//////
    $("#ruc_ci").keyup(function() {
        var ci = $("#ruc_ci").val();
        var pares = 0;
        var impares = 0;
        var cont = 0;
        var total = 0;
        var residuo = 0;
        if ($("#tipo_docu option:selected").text() === "Cedula") {
            if ($("#ruc_ci").val().length === 10) {
                for (var i = 0; i < 9; i++) {
                    if (i % 2 === 0) {
                        if (parseInt(ci.charAt(i)) * 2 > 9) {
                            cont = (parseInt(ci.charAt(i)) * 2) - 9;
                        }
                        else {
                            cont = (parseInt(ci.charAt(i)) * 2);
                        }
                        impares = impares + cont;
                    }
                    else {
                        pares = pares + parseInt(ci.charAt(i));
                    }
                }
                total = pares + impares;
                if (total % 10 === 0) {
                }
                else {
                    residuo = total % 10;
                    residuo = 10 - residuo;
                    if (parseInt(ci.charAt(9)) === residuo) {
                    }
                    else {
                        alert("Error.... Cedula Incorrecta");
                        $("#ruc_ci").val("");
                    }
                }
            }
        }else{
            if ($("#tipo_docu option:selected").text() === "Ruc") {
                var ruc = ci.substr(10,13);
                
                if(ruc == "001" ){
                    var ce = ci.substr(0,10);
                    for (i = 0; i < 9; i++) {
                        if (i % 2 === 0) {
                            if (parseInt(ce.charAt(i)) * 2 > 9) {
                                cont = (parseInt(ce.charAt(i)) * 2) - 9;
                            }
                            else {
                                cont = (parseInt(ce.charAt(i)) * 2);
                            }
                            impares = impares + cont;
                        }
                        else {
                            pares = pares + parseInt(ce.charAt(i));
                        }
                    }
                    total = pares + impares;
                    if (total % 10 === 0) {
                    }
                    else {
                        residuo = total % 10;
                        residuo = 10 - residuo;
                        if (parseInt(ce.charAt(9)) === residuo) {
                        }
                        else {
                            alert("Error.... Ruc Incorrecto");
                            $("#ruc_ci").val("");
                        }
                    }
                }else{
                    if($("#ruc_ci").val().length === 13){
                        alert("Error.... Ruc Incorrecto");   
                        $("#ruc_ci").val("");
                    }
                }
            }
        }
    });
    //////////////////////

    /////valida si ya existe/////
    $("#ruc_ci").keyup(function() {
        $.ajax({
            type: "POST",
            url: "../procesos/comparar_cedulas2.php",
            data: "cedula=" + $("#ruc_ci").val(),
            success: function(data) {
                var val = data;
                if (val == 1)
                {
                    alert("Error... El proveedor ya ésta registrado");
                    $("#ruc_ci").val("");
                    $("#ruc_ci").focus();
                }
            }
        });
    });
    ////////////////////////////////


    //////////////////////
    $("#btnGuardar").click(function(e) {
        e.preventDefault();
    });
    $("#btnBuscar").click(function(e) {
        e.preventDefault();
    });
    $("#btnModificar").click(function(e) {
        e.preventDefault();
    });
    $("#btnNuevo").click(function(e) {
        e.preventDefault();
    });
    ///////////////////////

    //////////////////////
    $("#btnGuardar").on("click", guardar_proveedor);
    $("#btnModificar").on("click", modificar_proveedor);
    $("#btnNuevo").on("click", nuevo_proveedor);
    $("#btnBuscar").on("click", abrirDialogo);

    /////////////////////

    $("#proveedores").dialog(dialogo);


    /////////////tabla proveedores/////////
    jQuery("#list").jqGrid({
        url: '../xml/datos_proveedores.php',
        datatype: 'xml',
        colNames: ['Codigo', 'Tipo Documento', 'Identificación', 'Empresa', 'Representante', 'Visitador', 'Dirección', 'Teléfono', 'Movil', 'Correo', 'Fax', 'País', 'Ciudad', 'Forma Pago', 'Principal', 'Observacion'],
        colModel: [
            {name: 'id_proveedor', index: 'id_proveedor', editable: true, align: 'center', width: '120', search: false, frozen: true, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'tipo_docu', index: 'tipo_docu', editable: true, align: 'center', width: '120', search: false, frozen: true, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'ruc_ci', index: 'ruc_ci', editable: true, align: 'center', width: '120', search: true, frozen: true, formoptions: {elmsuffix: " (*)"}, editrules: {required: true}},
            {name: 'empresa_pro', index: 'empresa_pro', editable: true, align: 'center', width: '120', search: true, frozen: true, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'representante_legal', index: 'representante_legal', editable: true, align: 'center', width: '120', search: true, frozen: true, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'visitador', index: 'visitador', editable: true, align: 'center', width: '120', search: false, frozen: true, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'direccion_pro', index: 'direccion_pro', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'nro_telefono', index: 'nro_telefono', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'nro_celular', index: 'nro_celular', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'correo', index: 'correo', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'fax', index: 'fax', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'pais_pro', index: 'pais_pro', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'ciudad_pro', index: 'ciudad_pro', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'forma_pago', index: 'forma_pago', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'principal_pro', index: 'principal_pro', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}},
            {name: 'observaciones_pro', index: 'observaciones_pro', editable: true, align: 'center', width: '120', search: false, frozen: false, editoptions: {readonly: 'readonly'}, formoptions: {elmprefix: ""}}
        ],
        rowNum: 10,
        width: 830,
        rowList: [10, 20, 30],
        pager: jQuery('#pager'),
        sortname: 'id_proveedor',
        shrinkToFit: false,
        sortorder: 'asc',
        caption: 'Lista de Proveedores',
        editurl: 'procesos/estadio_del.php',
        viewrecords: true,
        ondblClickRow: function(){
        var id = jQuery("#list").jqGrid('getGridParam', 'selrow');
        jQuery('#list').jqGrid('restoreRow', id);
        jQuery("#list").jqGrid('GridToForm', id, "#proveedores_form");
        $("#btnGuardar").attr("disabled", true);
        $("#proveedores").dialog("close");    
        }
    }).jqGrid('navGrid', '#pager',
            {
                add: false,
                edit: false,
                del: false,
                refresh: true,
                search: true,
                view: true
            },
    {
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
            }
    );
    /////////////////	
   
    jQuery("#list").jqGrid('navButtonAdd', '#pager', {caption: "Añadir",
        onClickButton: function() {
            var id = jQuery("#list").jqGrid('getGridParam', 'selrow');
            jQuery('#list').jqGrid('restoreRow', id);
            var ret = jQuery("#list").jqGrid('getRowData', id);
            if (id) {
                jQuery("#list").jqGrid('GridToForm', id, "#proveedores_form");
                $("#btnGuardar").attr("disabled", true);
                $("#proveedores").dialog("close");
            }
            else {
                alert("Seleccione un fila");
            }
        }
    });
}


