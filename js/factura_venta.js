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
    width: 600,
    height: 420,
    modal: true
};

var dialogo2 =
{
    autoOpen: false,
    resizable: false,
    width: 800,
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

function enter(e) {
    if (e.which === 13 || e.keyCode === 13) {
        entrar();
        return false;
    }
    return true;
}

function enter1(e) {
    if (e.which === 13 || e.keyCode === 13) {
        entrar2();
        return false;
    }
    return true;
}

function enter2(e) {
    if (e.which === 13 || e.keyCode === 13) {
        entrar3();
        return false;
    }
    return true;
}

function enter3(e) {
    if (e.which === 13 || e.keyCode === 13) {
        comprobar();
        return false;
    }
    return true;
}

function enter4(e) {
    if (e.which === 13 || e.keyCode === 13) {
        comprobar1();
        return false;
    }
    return true;
}

function entrar() {
    if ($("#cod_producto").val() === "") {
        $("#codigo").focus();
        alert("Ingrese un producto");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Ingrese un producto");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Ingrese un producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                    alert("Ingrese una cantidad");
                } else {
                    $("#p_venta").focus();
                }
            }
        }
    }
}

function entrar2() {
    if ($("#cod_producto").val() === "") {
        $("#codigo").focus();
        alert("Ingrese un producto");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Ingrese un producto");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Ingrese un producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                    alert("Ingrese una cantidad");
                } else {
                    if ($("#p_venta").val() === "") {
                        $("#p_venta").focus();
                        alert("Ingrese precio venta");
                    } else {
                        $("#descuento").focus();
                    }
                }
            }
        }
    }
}

function entrar3() {
    if ($("#cod_producto").val() === "") {
        $("#codigo").focus();
        alert("Ingrese un producto");
    } else {
        if ($("#codigo").val() === "") {
            $("#codigo").focus();
            alert("Ingrese un producto");
        } else {
            if ($("#producto").val() === "") {
                $("#producto").focus();
                alert("Ingrese un producto");
            } else {
                if ($("#cantidad").val() === "") {
                    $("#cantidad").focus();
                    alert("Ingrese una cantidad");
                } else {
                    if ($("#p_venta").val() === "") {
                        $("#p_venta").focus();
                        alert("Ingrese un precio");
                    } else {
                        if ($("#inventar").val() === "No") {
                            var filas = jQuery("#list").jqGrid("getRowData");
                            var descuento = 0;
                            var cal = 0;
                            var total = 0;
                            var su = 0;
                            var desc = 0;
                            var precio = 0;
                            var multi = 0;
                            if (filas.length === 0) {
                                if ($("#descuento").val() !== "")
                                {
                                    desc = $("#descuento").val();
                                    precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                    multi = ($("#cantidad").val() * precio).toFixed(2);
                                    descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                    total = (multi - descuento).toFixed(2);
                                } else {
                                    desc = 0;
                                    precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                    total = ($("#cantidad").val() * precio).toFixed(2);
                                }
                                var datarow = {
                                    cod_producto: $("#cod_producto").val(), 
                                    codigo: $("#codigo").val(), 
                                    detalle: $("#producto").val(), 
                                    cantidad: $("#cantidad").val(), 
                                    precio_u: precio, 
                                    descuento: desc, 
                                    total: total, 
                                    iva: $("#iva_producto").val(), 
                                    pendiente: 0
                                };
                                su = jQuery("#list").jqGrid('addRowData', $("#cod_producto").val(), datarow);
                                $("#cod_producto").val("");
                                $("#codigo").val("");
                                $("#producto").val("");
                                $("#cantidad").val("");
                                $("#p_venta").val("");
                                $("#descuento").val("");
                                $("#disponibles").val("");
                                $('#combobox').children().remove().end();
                            }
                            else {
                                var repe = 0;
                                for (var i = 0; i < filas.length; i++) {
                                    var id = filas[i];
                                    if (id['cod_producto'] === $("#cod_producto").val()) {
                                        repe = 1;
                                    }
                                }
                                if (repe === 1) {
                                    if ($("#descuento").val() !== "")
                                    {
                                        desc = $("#descuento").val();
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        multi = ($("#cantidad").val() * precio).toFixed(2);
                                        descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                        total = (multi - descuento).toFixed(2);
                                    } else {
                                        desc = 0;
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        total = ($("#cantidad").val() * precio).toFixed(2);
                                    }
                                    
                                    datarow = {
                                        cod_producto: $("#cod_producto").val(), 
                                        codigo: $("#codigo").val(), 
                                        detalle: $("#producto").val(), 
                                        cantidad: $("#cantidad").val(), 
                                        precio_u: precio, 
                                        descuento: desc, 
                                        total: total, 
                                        iva: $("#iva_producto").val(), 
                                        pendiente: 0
                                    };
                                    su = jQuery("#list").jqGrid('setRowData', $("#cod_producto").val(), datarow);
                                    $("#cod_producto").val("");
                                    $("#codigo").val("");
                                    $("#producto").val("");
                                    $("#cantidad").val("");
                                    $("#p_venta").val("");
                                    $("#descuento").val("");
                                    $("#disponibles").val("");
                                    $('#combobox').children().remove().end();
                                }
                                else {
                                    if ($("#descuento").val() !== "")
                                    {
                                        desc = $("#descuento").val();
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        multi = ($("#cantidad").val() * precio).toFixed(2);
                                        descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                        total = (multi - descuento).toFixed(2);
                                    } else {
                                        desc = 0;
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        total = ($("#cantidad").val() * precio).toFixed(2);
                                    }
                                    
                                    datarow = {
                                        cod_producto: $("#cod_producto").val(), 
                                        codigo: $("#codigo").val(), 
                                        detalle: $("#producto").val(), 
                                        cantidad: $("#cantidad").val(), 
                                        precio_u: precio, 
                                        descuento: desc, 
                                        total: total, 
                                        iva: $("#iva_producto").val(), 
                                        pendiente: 0
                                    };
                                    su = jQuery("#list").jqGrid('addRowData', $("#cod_producto").val(), datarow);
                                    $("#cod_producto").val("");
                                    $("#codigo").val("");
                                    $("#producto").val("");
                                    $("#cantidad").val("");
                                    $("#p_venta").val("");
                                    $("#descuento").val("");
                                    $("#disponibles").val("");
                                    $('#combobox').children().remove().end();
                                }
                            }

                            ////////////calcular valores//////////////////
                            var subtotal = 0;
                            var iva = 0;
                            var t_fc = 0;
                            var mu = 0;
                            var des = 0;
                            var descu = 0;
                            if ($("#iva_producto").val() === "Si") {
                                var fil = jQuery("#list").jqGrid("getRowData");
                                for (var t = 0; t < fil.length; t++) {
                                    var dd = fil[t];
                                    if (dd['iva'] === "Si") {
                                        subtotal = (subtotal + parseFloat(dd['total']));
                                        var sub = parseFloat(subtotal).toFixed(2);
                                        
                                        mu = (dd['cantidad'] * dd['precio_u']).toFixed(2);
                                        des = ((mu * dd['descuento'])/100).toFixed(2);
                                        descu = (parseFloat(descu) + parseFloat(des)).toFixed(2);
                                        $("#iva_producto").val("");
                                    }
                                }
                                iva = ((subtotal * 12) / 100).toFixed(2);
                                t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p").val())).toFixed(2);
                                $("#total_p2").val(sub);
                                $("#iva").val(iva);
                                $("#desc").val(descu);
                                $("#tot").val(t_fc);
                            } else {
                                if ($("#iva_producto").val() === "No") {
                                    fil = jQuery("#list").jqGrid("getRowData");
                                    subtotal = 0;
                                    t_fc = 0;
                                    iva = 0;
                                    mu = 0;
                                    des = 0;
                                    descu = 0;
                                    for (t = 0; t < fil.length; t++) {
                                         dd = fil[t];
                                        if (dd['iva'] === "No") {
                                            subtotal = (subtotal + parseFloat(dd['total']));
                                            sub = parseFloat(subtotal).toFixed(2);
                                            mu = (dd['cantidad'] * dd['precio_u']).toFixed(2);
                                            des = ((mu * dd['descuento'])/100).toFixed(2);
                                            descu = (parseFloat(descu) + parseFloat(des)).toFixed(2);
                                            $("#iva_producto").val("");
                                        }
                                    }
                                    iva = parseFloat($("#iva").val());
                                    t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p2").val())).toFixed(2);
                                    $("#total_p").val(sub);
                                    $("#desc").val(descu);
                                    $("#tot").val(t_fc);
                                }
                            }
                            $("#codigo").focus();
                        } else {
                            if ($("#inventar").val() === "Si") {
                                if (parseInt($("#cantidad").val()) > parseInt($("#disponibles").val())) {
                                    alert("Error.. La cantidad ingresada es mayor a la disponible");
                                }
                                
                                /////////////////comprobar/////////////////
                                filas = jQuery("#list").jqGrid("getRowData");
                                descuento = 0;
                                cal = 0;
                                total = 0;
                                su = 0;
                                desc = 0;
                                precio = 0;
                                multi = 0;
                                if (filas.length === 0) {
                                    if ($("#descuento").val() !== "")
                                    {
                                        desc = $("#descuento").val();
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        multi = ($("#cantidad").val() * precio).toFixed(2);
                                        descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                        total = (multi - descuento).toFixed(2);
                                    } else {
                                        desc = 0;
                                        precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                        total = ($("#cantidad").val() * precio).toFixed(2);
                                    }
                                    datarow = {
                                        cod_producto: $("#cod_producto").val(), 
                                        codigo: $("#codigo").val(), 
                                        detalle: $("#producto").val(), 
                                        cantidad: $("#cantidad").val(), 
                                        precio_u: precio, 
                                        descuento: desc, 
                                        total: total, 
                                        iva: $("#iva_producto").val(), 
                                        pendiente: 0
                                    };
                                    su = jQuery("#list").jqGrid('addRowData', $("#cod_producto").val(), datarow);
                                    $("#cod_producto").val("");
                                    $("#codigo").val("");
                                    $("#producto").val("");
                                    $("#cantidad").val("");
                                    $("#p_venta").val("");
                                    $("#descuento").val("");
                                    $("#disponibles").val("");
                                    $('#combobox').children().remove().end();
                                }
                                else {
                                    repe = 0;
                                    for (i = 0; i < filas.length; i++) {
                                         id = filas[i];
                                        if (id['cod_producto'] === $("#cod_producto").val()) {
                                            repe = 1;
                                        }
                                    }
                                    if (repe === 1) {
                                        if ($("#descuento").val() !== "")
                                        {
                                            desc = $("#descuento").val();
                                            precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                            multi = ($("#cantidad").val() * precio).toFixed(2);
                                            descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                            total = (multi - descuento).toFixed(2);
                                        } else {
                                            desc = 0;
                                            precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                            total = ($("#cantidad").val() * precio).toFixed(2);
                                        }
                                        
                                        datarow = {
                                            cod_producto: $("#cod_producto").val(), 
                                            codigo: $("#codigo").val(), 
                                            detalle: $("#producto").val(), 
                                            cantidad: $("#cantidad").val(), 
                                            precio_u: precio, 
                                            descuento: desc, 
                                            total: total, 
                                            iva: $("#iva_producto").val(), 
                                            pendiente: 0
                                        };
                                        su = jQuery("#list").jqGrid('setRowData', $("#cod_producto").val(), datarow);
                                        $("#cod_producto").val("");
                                        $("#codigo").val("");
                                        $("#producto").val("");
                                        $("#cantidad").val("");
                                        $("#p_venta").val("");
                                        $("#descuento").val("");
                                        $("#disponibles").val("");
                                        $('#combobox').children().remove().end();
                                    }
                                    else {
                                        if ($("#descuento").val() !== "")
                                        {
                                            desc = $("#descuento").val();
                                            precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                            multi = ($("#cantidad").val() * precio).toFixed(2);
                                            descuento = ((multi * parseFloat($("#descuento").val())) / 100);
                                            total = (multi - descuento).toFixed(2);
                                        } else {
                                            desc = 0;
                                            precio = (parseFloat($("#p_venta").val())).toFixed(2);
                                            total = ($("#cantidad").val() * precio).toFixed(2);
                                        }
                                       
                                        datarow = {
                                            cod_producto: $("#cod_producto").val(), 
                                            codigo: $("#codigo").val(), 
                                            detalle: $("#producto").val(), 
                                            cantidad: $("#cantidad").val(), 
                                            precio_u: precio, 
                                            descuento: desc, 
                                            total: total, 
                                            iva: $("#iva_producto").val(), 
                                            pendiente: 0
                                        };
                                        su = jQuery("#list").jqGrid('addRowData', $("#cod_producto").val(), datarow);
                                        $("#cod_producto").val("");
                                        $("#codigo").val("");
                                        $("#producto").val("");
                                        $("#cantidad").val("");
                                        $("#p_venta").val("");
                                        $("#descuento").val("");
                                        $("#disponibles").val("");
                                        $('#combobox').children().remove().end();
                                    }
                                }

                                ///////////////calcular valores////////////////////
                                if ($("#iva_producto").val() === "Si") {
                                    fil = jQuery("#list").jqGrid("getRowData");
                                    subtotal = 0;
                                    iva = 0;
                                    t_fc = 0;
                                    mu = 0;
                                    des = 0;
                                    descu = 0;
                                    for (t = 0; t < fil.length; t++) {
                                        dd = fil[t];
                                        if (dd['iva'] === "Si") {
                                            subtotal = (subtotal + parseFloat(dd['total']));
                                            sub = parseFloat(subtotal).toFixed(2);
                                            mu = (dd['cantidad'] * dd['precio_u']).toFixed(2);
                                            des = ((mu * dd['descuento'])/100).toFixed(2);
                                            descu = (parseFloat(descu) + parseFloat(des)).toFixed(2);
                                            $("#iva_producto").val("");
                                        }
                                    }
                                    iva = ((subtotal * 12) / 100).toFixed(2);
                                    t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p").val())).toFixed(2);
                                    $("#total_p2").val(sub);
                                    $("#iva").val(iva);
                                    $("#desc").val(descu);
                                    $("#tot").val(t_fc);
                                } else {
                                    if ($("#iva_producto").val() === "No") {
                                        fil = jQuery("#list").jqGrid("getRowData");
                                        subtotal = 0;
                                        t_fc = 0;
                                        iva = 0;
                                        mu = 0;
                                        des = 0;
                                        descu = 0;
                                        for (t = 0; t < fil.length; t++) {
                                             dd = fil[t];
                                            if (dd['iva'] === "No") {
                                                subtotal = (subtotal + parseFloat(dd['total']));
                                                sub = parseFloat(subtotal).toFixed(2);
                                                mu = (dd['cantidad'] * dd['precio_u']).toFixed(2);
                                                des = ((mu * dd['descuento'])/100).toFixed(2);
                                                descu = (parseFloat(descu) + parseFloat(des)).toFixed(2);
                                                $("#iva_producto").val("");
                                            }
                                        }
                                        iva = parseFloat($("#iva").val());
                                        t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p2").val())).toFixed(2);
                                        $("#total_p").val(sub);
                                        $("#desc").val(descu);
                                        $("#tot").val(t_fc);
                                    }
                                }
                                $("#codigo").focus();
                            }
                        }
                    }
                }
            }
        }
    }
}

function abrirDialogo() {
    var cod = $("#cod_producto").val();
    
    if (cod === "") {
        alert("Error... Seleccione un producto");
    } else {
        $("#combobox").append('<option></option>');
        $.getJSON('../procesos/retornar_series.php?cod=' + cod, function(data) {
            var tama = data.length;
            if (tama == 0) {
                alert("Series no ingresadas"); 
            }else{
                if($("#cantidad").val() == ""){
                    alert("Error... Indique una cantidad");
                    $("#cantidad").focus();
                }else{
                    $('#combobox').children().remove().end();
                    $("#series").dialog("open");
                    $("#combobox").append('<option></option>');
                    for (var i = 0; i < tama; i = i + 1)
                    {
                        $("#combobox").append('<option value='+data[i]+' >'+data[i]+'</option>');
                    }
                    $.widget( "custom.combobox", {
                        _create: function() {
                            this.wrapper = $( "<span>" )
                            .addClass( "custom-combobox" )
                            .insertAfter( this.element );

                            this.element.hide();
                            this._createAutocomplete();
                            this._createShowAllButton();
                        },

                        _createAutocomplete: function() {
                            var selected = this.element.children( ":selected" ),
                            value = selected.val() ? selected.text() : "";

                            this.input = $( "<input>" )
                            .appendTo( this.wrapper )
                            .val( value )
                            .attr( "title", "" )
                            .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                            .autocomplete({
                                delay: 0,
                                minLength: 0,
                                source: $.proxy( this, "_source" )
                            })
                            .tooltip({
                                tooltipClass: "ui-state-highlight"
                            });

                            this._on( this.input, {
                                autocompleteselect: function( event, ui ) {
                                    ui.item.option.selected = true;
                                    this._trigger( "select", event, {
                                        item: ui.item.option
                                    });
                                },

                                autocompletechange: "_removeIfInvalid"
                            });
                        },
                        
                        _createShowAllButton: function() {
                            var input = this.input,
                            wasOpen = false;

                            $( "<a>" )
                            .attr( "tabIndex", -1 )
                            .attr( "title", "Todas las series" )
                            .tooltip()
                            .appendTo( this.wrapper )
                            .button({
                                icons: {
                                    primary: "ui-icon-triangle-1-s"
                                },
                                text: false
                            })
                            .removeClass( "ui-corner-all" )
                            .addClass( "custom-combobox-toggle ui-corner-right" )
                            .mousedown(function() {
                                wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                            })
                            .click(function() {
                                input.focus();

                                if ( wasOpen ) {
                                    return;
                                }

                                input.autocomplete( "search", "" );
                            });
                        },

                        _source: function( request, response ) {
                            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                            response( this.element.children( "option" ).map(function() {
                                var text = $( this ).text();
                                if ( this.value && ( !request.term || matcher.test(text) ) )
                                    return {
                                        label: text,
                                        value: text,
                                        option: this
                                    };
                            }) );
                        },

                        _removeIfInvalid: function( event, ui ) {
                   
                            // Selected an item, nothing to do
                            if ( ui.item ) {
                                return;
                            }
                   
                            // Search for a match (case-insensitive)
                            var value = this.input.val(),
                            valueLowerCase = value.toLowerCase(),
                            valid = false;
                            this.element.children( "option" ).each(function() {
                                if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                                    this.selected = valid = true;
                                    return false;
                                }
                            });
                   
                            // Found a match, nothing to do
                            if ( valid ) {
                                return;
                            }
                   
                            // Remove invalid value
                            this.input
                            .val( "" )
                            .attr( "title", value + " La serie no existe" )
                            .tooltip( "open" );
                            this.element.val( "" );
                            this._delay(function() {
                                this.input.tooltip( "close" ).attr( "title", "" );
                            }, 2500 );
                            this.input.autocomplete( "instance" ).term = "";
                        },

                        _destroy: function() {
                            this.wrapper.remove();
                            this.element.show();
                        }

                    });
                    $("#combobox" ).combobox();
                }
            }
        });
    }
}

function agregar() {
    
    if ($("#combobox").val() !== "") {
        var filas2 = jQuery("#list3").jqGrid("getRowData");
        var su;
        var count = 0;
        var canti = $("#cantidad").val();
        
        if (filas2.length < canti) {
            if (filas2.length === 0) {
                var datarow = {
                    id_serie: count = count + 1, 
                    serie: $("#combobox").val()
                };
                su = jQuery("#list3").jqGrid('addRowData', count, datarow);
                $("#combobox").val("");
            } else {
                var repe = 0;
                for (var i = 0; i < filas2.length; i++) {
                    var id = filas2[i];
                    if (id['serie'] === $("#combobox").val()) {
                        repe = 1;
                    }
                }
                
                if (repe === 0) {
                    datarow = {
                        id_serie: count = count + 1, 
                        serie: $("#combobox").val()
                    };
                    su = jQuery("#list3").jqGrid('addRowData', count, datarow);
                $("#combobox").val("");
                } else {
                    alert("Error... Serie ingresada");
                $("#combobox").val("");
                }
            }
        } else {
            alert("Error... Alcanzo el limite máximo");
         }
    } else {
        alert("Error... En la serie");
        $("#combobox").focus();
    }
}

function countfactura() {
    var temp2 = "";
    var serie = $("#num_factura").val();
    for (var i = serie.length; i < 5; i++) {
        temp2 = temp2 + "0";
    }
    return temp2;
}

function autocompletar() {
    var temp = "";
    var serie = $("#num_factura").val();
    for (var i = serie.length; i < 9; i++) {
        temp = temp + "0";
    }
    return temp;
}

function comprobar() {
    if ($("#num_factura").val() === "") {
        $("#num_factura").focus();
        alert("Ingrese número de factura");
    } else {
        var a = autocompletar($("#num_factura").val());
        $("#num_factura").val(a + "" + $("#num_factura").val());
        $("#ruc_ci").focus();
    }
}

function nuevo_cliente(){
    if (confirm("Desea registrar un nuevo cliente") == true) {
        //////////////verificar si esxiste cliente/////////////
        $.ajax({
            type: "POST",
            url: "../procesos/comparar_cedulas.php",
            data: "cedula=" + $("#ruc_ci").val(),
            success: function(data) {
                var val = data;
                if (val == 1)
                {
                    alert("Error... El cliente esta registrado");
                    $("#ruc_ci").val("");
                    $("#ruc_ci").focus();
                }else{
                     //////////validar cedula y ruc//////////
                    if ($("#ruc_ci").val().length !== 10 && $("#ruc_ci").val().length !== 13) {
                        alert("Error... Ingrese una Identificación valida");
                        $("#ruc_ci").val("");   
                    }else{   
                        var ci = $("#ruc_ci").val();
                        var pares = 0;
                        var impares = 0;
                        var cont = 0;
                        var total = 0;
                        var residuo = 0;
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
                                    $("#direccion_cliente").removeAttr("disabled");
                                    $("#telefono_cliente").removeAttr("disabled");
                                    $("#saldo").removeAttr("disabled");
                                    $("#nombre_cliente").focus();
                                }
                                else {
                                    alert("Error.... Cédula Incorrecta");
                                    $("#ruc_ci").val("");
                                }
                            }
                        }else{
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
                                        $("#direccion_cliente").removeAttr("disabled");
                                        $("#telefono_cliente").removeAttr("disabled");
                                        $("#saldo").removeAttr("disabled");
                                        $("#nombre_cliente").focus();  
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
                }
            }
        });
    }else{
        $("#ruc_ci").val("");
        $("#direccion_cliente").attr("disabled", "disabled");
        $("#telefono_cliente").attr("disabled", "disabled");
        $("#saldo").attr("disabled", "disabled");
    }
}

function comprobar1() {
    if ($("#num_factura").val() === "") {
        $("#num_factura").focus();
        alert("Ingrese número de factura");
    } else {
        if ($("#id_cliente").val() === "" && $("#ruc_ci").val() !== "") {
            nuevo_cliente();
        }else{
            if ($("#id_cliente").val() === "") {
                $("#ruc_ci").focus();
                alert("Indique un cliente");
            } else {
                if ($("#ruc_ci").val() === "") {
                    $("#ruc_ci").focus();
                    alert("Indique un cliente");
                } else {
                    if ($("#tipo_precio").val() === "") {
                        $("#tipo_precio").focus();
                        alert("Error... Seleccione tipo de precio");
                    }
                }
            } 
        }
    }
}

function agregar_proforma() {
    if ($("#proforma").val() === "") {
        $("#proforma").focus();
        alert("Error... Ingrese número de la proforma");
    } else {
        var id_proforma = $("#proforma").val();
        /////////////////llamado datos personales/////////////
        $.getJSON('../procesos/retornar_proforma_clientes.php?id1=' + id_proforma, function(data) {
            var tama2 = data.length;
            for (var i = 0; i < tama2; i = i + 8)
            {
                $("#id_cliente").val(data[i]);
                $("#ruc_ci").val(data[i + 1 ]);
                $("#nombre_cliente").val(data[i + 2]);
                $("#direccion_cliente").val(data[i + 3]);
                $("#telefono_cliente").val(data[i + 4]);
                $("#saldo").val(data[i + 5]);
                $("#tipo_precio").val(data[i + 6]);
                $("#desc").val(data[i + 7]);
            }
        });
        ////////////////////////////////////////////////////
        //
        //////////////llamado detalle factura//////////////
        $.getJSON('../procesos/retornar_proforma.php?id2=' + id_proforma, function(data) {
            var tama = data.length;
            if (tama === 0) {
                alert("Error... La proforma no existe");
                location.reload();
            } else {
                $("#list").jqGrid("clearGridData", true);
                var descuento = 0;
                var multi = 0;
                var cal = 0;
                var total = 0;
                for (var i = 0; i < tama; i = i + 9)
                {
                    var temp = 0;
                    var temp1 = 0;
                    if (data[i + 8] === 0) {
                        temp = 0;
                        temp1 = data[i + 3];
                    }
                    else {
                        if (data[i + 8] < data[i + 3]) {
                            temp = data[i + 8];
                            temp1 = data[i + 3] - data[i + 8];
                        } else {
                            if (data[i + 8] > data[i + 3]) {
                                temp = data[i + 3];
                                temp1 = 0;
                            }
                            else {
                                if (data[i + 8] === data[i + 3]) {
                                    temp = data[i + 3];
                                    temp1 = 0;
                                }
                                else {
                                    if (data[i + 3] === data[i + 8]) {
                                        temp = data[i + 3];
                                        temp1 = 0;
                                    }
                                }
                            }
                        }
                    }

                     multi = (temp * data[i + 4]).toFixed(2);
                     descuento = ((multi * parseFloat(data[i + 5])) / 100);
                     total = (multi - descuento).toFixed(2);
                    //var cal = (temp * data[i + 4]).toFixed(2);

                    var datarow = {cod_producto: data[i], codigo: data[i + 1], detalle: data[i + 2], cantidad: temp, precio_u: data[i + 4], descuento: data[i + 5], total: total, iva: data[i + 7], pendiente: temp1};
                    var su = jQuery("#list").jqGrid('addRowData', data[i], datarow);
                    var ivas = data[i + 7];

                    ////////////////calcular valores////////////
                    if (ivas === "Si") {
                        var fil = jQuery("#list").jqGrid("getRowData");
                        var subtotal = 0;
                        var iva = 0;
                        var t_fc = 0;
                        for (var t = 0; t < fil.length; t++) {
                            var dd = fil[t];
                            if (dd['iva'] === "Si") {
                                subtotal = (subtotal + parseFloat(dd['total']));
                                var sub = parseFloat(subtotal).toFixed(2);
                                $("#iva_producto").val("");
                            }
                        }
                        iva = ((subtotal * 12) / 100).toFixed(2);
                        t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p").val())).toFixed(2);
                        $("#total_p2").val(sub);
                        $("#iva").val(iva);
                        $("#tot").val(t_fc);
                    } else {
                        if (ivas === "No") {
                            var fil = jQuery("#list").jqGrid("getRowData");
                            var subtotal = 0;
                            var t_fc = 0;
                            var iva = 0;
                            for (var t = 0; t < fil.length; t++) {
                                var dd = fil[t];
                                if (dd['iva'] === "No") {
                                    subtotal = (subtotal + parseFloat(dd['total']));
                                    var sub = parseFloat(subtotal).toFixed(2);
                                    $("#iva_producto").val("");
                                }
                            }
                            iva = parseFloat($("#iva").val());
                            t_fc = ((parseFloat(subtotal) + parseFloat(iva)) + parseFloat($("#total_p2").val())).toFixed(2);
                            $("#total_p").val(sub);
                            $("#tot").val(t_fc);
                        }
                    }
                }
            }
        });
    }
}

function guardar_serie() {
    var tam2 = jQuery("#list3").jqGrid("getRowData");

    if (tam2.length > 0) {
        $("#combobox").append('<option></option>');
        var v1 = new Array();
        var string_v1 = "";
        var fil = jQuery("#list3").jqGrid("getRowData");

        for (var i = 0; i < fil.length; i++) {
            var datos = fil[i];
            v1[i] = datos['serie'];
        }

        for (i = 0; i < fil.length; i++) {
            string_v1 = string_v1 + "|" + v1[i];
        }
        $.ajax({
            type: "POST",
            url: "../procesos/guardar_series2.php",
            data: "cod_producto=" + $("#cod_producto").val() + "&campo1=" + string_v1+ "&comprobante=" + $("#comprobante").val(),
            success: function(data) {
                var val = data;
                if (val == 1)
                {
                    $("#list3").jqGrid("clearGridData", true);
                    $("#series").dialog("close");
                    $("#descuento").focus();  
                }
            }
        });
    } else {
        alert("Error... Ingrese las series");
    }
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

function flecha_atras(){
 $.ajax({
        type: "POST",
        url: "../procesos/flechas.php",
        data: "comprobante=" + $("#comprobante").val() + "&tabla=" + "factura_venta" + "&id_tabla=" + "id_factura_venta" + "&tipo=" + 1,
        success: function(data) {
            var val = data;
            if(val != ""){
                $("#comprobante").val(val);
                var valor = $("#comprobante").val();
                ///////////////////llamar factura flechas primera parte/////
                $("#btnGuardar").attr("disabled", true);
                $("#btnModificar").attr("disabled", true);
                $("#num_factura").attr("disabled", "disabled");
                $("#ruc_ci").attr("disabled", "disabled");
                $("#nombre_cliente").attr("disabled", "disabled");
                $("#formas").attr("disabled", true);
                $("#codigo").attr("disabled", "disabled");
                $("#producto").attr("disabled", "disabled");
                $("#cantidad").attr("disabled", "disabled");
                $("#p_venta").attr("disabled", "disabled");
                $("#btncargar").attr("disabled", "disabled");
                $("#autorizacion").attr("disabled", "disabled");
                $("#estado h3").remove();
                $("#formas").val("Contado");
                $("#adelanto").val("");
                $("#meses").val("");
                $('#cuotas').children().remove().end();
                $("#cuotas").attr("disabled", true); 
                $("#list").jqGrid("clearGridData", true);
                $("#total_p").val("0.00");
                $("#total_p2").val("0.00");
                $("#iva").val("0.00");
                $("#desc").val("0.00");
                $("#tot").val("0.00");

                 ///////////////////llamar factura flechas primera parte/////
                $.getJSON('../procesos/retornar_factura_venta.php?com=' + valor, function(data) {
                    var tama = data.length;
                    if (tama !== 0) {
                        for (var i = 0; i < tama; i = i + 22)
                        {
                            $("#fecha_actual").val(data[i]);
                            $("#hora_actual").val(data[i + 1 ]);
                            $("#digitador").val(data[i + 2 ] + " " + data[i + 3 ] );
                            var num = data[i + 4]; 
                            var res = num.substr(8, 20)
                            $("#num_factura").val(res);
                            $("#id_cliente").val(data[i + 5]);
                            $("#ruc_ci").val(data[i + 6]);
                            $("#nombre_cliente").val(data[i + 7]);
                            $("#direccion_cliente").val(data[i + 8]);
                            $("#telefono_cliente").val(data[i + 9]);
                            $("#saldo").val(data[i + 10]);
                            $("#cancelacion").val(data[i + 11]);
                            $("#autorizacion").val(data[i + 12]);
                            $("#fecha_auto").val(data[i + 13]);
                            $("#fecha_caducidad").val(data[i + 14]);

                            $("#tipo_precio").val(data[i + 15]);
                            if(data[ i+ 16 ] == "Pasivo"){
                                $("#estado").append($("<h3>").text("Anulada"));
                                $("#estado h3").css("color","red");
                                $("#btnAnular").attr("disabled", "disabled");
                            }else{
                                $("#estado h3").remove();
                                $("#btnAnular").attr("disabled", "disabled");
                                $("#btnAnular").attr("disabled", false);
                            }

                            $("#total_p").val(data[i + 17]);
                            $("#total_p2").val(data[i + 18]);
                            $("#iva").val(data[i + 19]);
                            $("#desc").val(data[i + 20]);
                            $("#tot").val(data[i + 21]);
                        }
                    }
                });
                ///////////////////////////////////////////////////   

                ///////////////////llamar factura flechas segunda parte/////
                $.getJSON('../procesos/retornar_factura_venta_credito.php?com=' + valor, function(data) {
                    var tama = data.length;
                    if (tama !== 0) {
                        for (var i = 0; i < tama; i = i + 4)
                        {
                            $("#formas").val(data[i]);
                            $("#adelanto").val(data[i + 1 ]);
                            $("#meses").val(data[i + 2 ]);

                            //////////calcular meses//////////
                            if (data[i + 2 ] > 1) {
                                $("#cuotas").attr("disabled", false); 
                                for (var j = 1; j <= data[i + 2 ] - 1; j++) {
                                    var calcu = data[i + 3] / (data[i + 2]);
                                    var entero = Math.floor(calcu).toFixed(2);
                                    $("#cuotas").append('<option>'+entero+'</option>'); 
                                }
                                var calcu1 = entero * (data[i + 2 ] - 1);
                                var sal = data[i + 3] - calcu1;
                                var entero2 = sal.toFixed(2);
                                $("#cuotas").append('<option>'+entero2+'</option>'); 

                            }else{
                                $("#cuotas").attr("disabled", false); 
                                $("#cuotas").append('<option>'+data[i + 3]+'</option>');  
                            }
                        }
                    }
                });
                /////////////////////////////////////////////////////////

                ////////////////////llamar factura flechas tercera parte/////
                $.getJSON('../procesos/retornar_factura_venta2.php?com=' + valor, function(data) {
                    var tama = data.length;
                    if (tama !== 0) {
                        for (var i = 0; i < tama; i = i + 9)
                        {
                            var datarow = {
                                cod_producto: data[i], 
                                codigo: data[i + 1], 
                                detalle: data[i + 2], 
                                cantidad: data[i + 3], 
                                precio_u: data[i + 4], 
                                descuento: data[i + 5], 
                                total: data[i + 6], 
                                iva: data[i + 7],
                                pendiente: data[i + 8]
                            };
                            var su = jQuery("#list").jqGrid('addRowData', data[i], datarow);
                        }
                    }
                });
                }else{
                alert("No hay mas registros posteriores!!");
            }
        }
    });
} 

function flecha_siguiente(){
 $.ajax({
        type: "POST",
        url: "../procesos/flechas.php",
        data: "comprobante=" + $("#comprobante").val() + "&tabla=" + "factura_venta" + "&id_tabla=" + "id_factura_venta" + "&tipo=" + 2,
        success: function(data) {
            var val = data;
            if(val != ""){   
            $("#comprobante").val(val);
            var valor = $("#comprobante").val();
            ///////////////////llamar factura flechas primera parte/////
            $("#btnGuardar").attr("disabled", true);
            $("#btnModificar").attr("disabled", true);
            $("#num_factura").attr("disabled", "disabled");
            $("#ruc_ci").attr("disabled", "disabled");
            $("#nombre_cliente").attr("disabled", "disabled");
            $("#formas").attr("disabled", true);
            $("#codigo").attr("disabled", "disabled");
            $("#producto").attr("disabled", "disabled");
            $("#cantidad").attr("disabled", "disabled");
            $("#p_venta").attr("disabled", "disabled");
            $("#btncargar").attr("disabled", "disabled");
            $("#autorizacion").attr("disabled", "disabled");
            $("#estado h3").remove();
            $("#formas").val("Contado");
            $("#adelanto").val("");
            $("#meses").val("");
            $('#cuotas').children().remove().end();
            $("#list").jqGrid("clearGridData", true);
            $("#total_p").val("0.00");
            $("#total_p2").val("0.00");
            $("#iva").val("0.00");
            $("#desc").val("0.00");
            $("#tot").val("0.00");
            
            $.getJSON('../procesos/retornar_factura_venta.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 22)
                    {
                    $("#fecha_actual").val(data[i]);
                    $("#hora_actual").val(data[i + 1 ]);
                    $("#digitador").val(data[i + 2 ] + " " + data[i + 3 ] );
                    var num = data[i + 4]; 
                    var res = num.substr(8, 20)
                    $("#num_factura").val(res);
                    $("#id_cliente").val(data[i + 5]);
                    $("#ruc_ci").val(data[i + 6]);
                    $("#nombre_cliente").val(data[i + 7]);
                    $("#direccion_cliente").val(data[i + 8]);
                    $("#telefono_cliente").val(data[i + 9]);
                    $("#saldo").val(data[i + 10]);
                    $("#cancelacion").val(data[i + 11]);
                    $("#autorizacion").val(data[i + 12]);
                    $("#fecha_auto").val(data[i + 13]);
                    $("#fecha_caducidad").val(data[i + 14]);
                    
                    $("#tipo_precio").val(data[i + 15]);
                    if(data[ i+ 16 ] == "Pasivo"){
                        $("#estado").append($("<h3>").text("Anulada"));
                        $("#estado h3").css("color","red");
                        $("#btnAnular").attr("disabled", "disabled");
                    }else{
                        $("#estado h3").remove();
                        $("#btnAnular").attr("disabled", "disabled");
                        $("#btnAnular").attr("disabled", false);
                    }
                    
                    $("#total_p").val(data[i + 17]);
                    $("#total_p2").val(data[i + 18]);
                    $("#iva").val(data[i + 19]);
                    $("#desc").val(data[i + 20]);
                    $("#tot").val(data[i + 21]);
                   }
                }
            });
            ///////////////////////////////////////////////////   
    
            ///////////////////llamar facturas flechas segunda parte/////
            $.getJSON('../procesos/retornar_factura_venta_credito.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 4)
                    {
                        $("#formas").val(data[i]);
                        $("#adelanto").val(data[i + 1 ]);
                        $("#meses").val(data[i + 2 ]);
                    
                        //////////calcular meses//////////
                        if (data[i + 2 ] > 1) {
                            $("#cuotas").attr("disabled", false); 
                            for (var j = 1; j <= data[i + 2 ] - 1; j++) {
                                var calcu = data[i + 3] / (data[i + 2]);
                                var entero = Math.floor(calcu).toFixed(2);
                                $("#cuotas").append('<option>'+entero+'</option>'); 
                            }
                            var calcu1 = entero * (data[i + 2 ] - 1);
                            var sal = data[i + 3] - calcu1;
                            var entero2 = sal.toFixed(2);
                            $("#cuotas").append('<option>'+entero2+'</option>'); 

                        }else{
                            $("#cuotas").attr("disabled", false); 
                            $("#cuotas").append('<option>'+data[i + 3]+'</option>');  
                        }
                    }
                }
            });
            /////////////////////////////////////////////////////////
    
            ////////////////////llamar facturas flechas tercera parte/////
            $.getJSON('../procesos/retornar_factura_venta2.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 9)
                    {
                        var datarow = {
                            cod_producto: data[i], 
                            codigo: data[i + 1], 
                            detalle: data[i + 2], 
                            cantidad: data[i + 3], 
                            precio_u: data[i + 4], 
                            descuento: data[i + 5], 
                            total: data[i + 6], 
                            iva: data[i + 7],
                            pendiente: data[i + 8]
                        };
                        var su = jQuery("#list").jqGrid('addRowData', data[i], datarow);
                    }
                }
            });
           }else{
                alert("No hay mas registros superiores!!");
            }
        }
    });
} 

function limpiar_campo(){
    if($("#ruc_ci").val() === ""){
        $("#id_cliente").val("");
        $("#nombre_cliente").val("");
        $("#direccion_cliente").val("");
        $("#telefono_cliente").val("");
        $("#saldo").val("");
        $("#direccion_cliente").attr("disabled", "disabled");
        $("#telefono_cliente").attr("disabled", "disabled");
        $("#saldo").attr("disabled", "disabled");
    }
}

function limpiar_campo2(){
    if($("#nombre_cliente").val() === ""){
        $("#id_cliente").val("");
        $("#ruc_ci").val("");
        $("#direccion_cliente").val("");
        $("#telefono_cliente").val("");
        $("#saldo").val("");
        $("#direccion_cliente").attr("disabled", "disabled");
        $("#telefono_cliente").attr("disabled", "disabled");
        $("#saldo").attr("disabled", "disabled");
    }
}

function limpiar_campo3(){
    if($("#codigo").val() === ""){
        $("#cod_producto").val("");
        $("#producto").val("");
        $("#cantidad").val("");
        $("#p_venta").val("");
        $("#disponibles").val("");
    }
}

function limpiar_campo4(){
    if($("#producto").val() === ""){
        $("#cod_producto").val("");
        $("#codigo").val("");
        $("#cantidad").val("");
        $("#p_venta").val("");
        $("#disponibles").val("");
    }
}

function limpiar_factura(){
    location.reload(); 
}

function anular_factura(){
    $("#clave_permiso").dialog("open");      
}

function validar_acceso(){
    if($("#clave").val() == ""){
        alert("Ingrese la clave");
        $("#clave").focus();
    }else{
        $.ajax({
            url: '../procesos/validar_acceso.php',
            type: 'POST',
            data: "clave=" + $("#clave").val(),
            success: function(data) {
                var val = data;
                if (val == 0)
                {
                    alert("Error... La clave es incorrecta ingrese nuevamente");
                    $("#clave").val("");
                    $("#clave").focus();
                }else{
                    if (val == 1)
                    {
                     $("#seguro").dialog("open");   
                    }
                }
            }
        });
    }   
}

function aceptar(){
var v1 = new Array();
var v2 = new Array();
var string_v1 = "";
var string_v2 = "";
var fil = jQuery("#list").jqGrid("getRowData");
for (var i = 0; i < fil.length; i++) {
    var datos = fil[i];
    v1[i] = datos['cod_producto'];
    v2[i] = datos['cantidad'];
}
for (i = 0; i < fil.length; i++) {
    string_v1 = string_v1 + "|" + v1[i];
    string_v2 = string_v2 + "|" + v2[i];
}

$.ajax({
    type: "POST",
    url: "../procesos/anular_factura_venta.php",
    data: "comprobante=" + $("#comprobante").val() + "&campo1=" + string_v1 + "&campo2=" + string_v2+ "&fecha_anulacion=" + $("#fecha_actual").val(),
    success: function(data) {
        var val = data;
        if (val == 1)
        {
            alert("Factura Anulada correctamente");
            location.reload();
        }
    }
}); 
}

function cancelar(){
$("#seguro").dialog("close");   
$("#clave_permiso").dialog("close");    
$("#clave").val("");    
}

function cancelar_acceso(){
$("#clave_permiso").dialog("close");     
$("#clave").val("");
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
    //
    /////////////validador factura//////
    if ($("#num_oculto").val() === "") {
        $("#num_factura").val("");
    } else {
        var str = $("#num_oculto").val();
        var res = parseInt(str.substr(8, 16));
        res = res + 1;
        
        $("#num_factura").val(res);
        var a = autocompletar(res);
        var validado = a + "" + res;
         $("#num_factura").val(validado);
    }
    /////////////////////////////////// 
    //
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

    $("#btncargar").on("click", abrirDialogo);
    $("#btnAgregar").on("click", agregar);
    $("#btnGuardarSeries").on("click", guardar_serie);
    $("#btnGuardar").on("click", guardar_factura);
    $("#btnNuevo").on("click", limpiar_factura);
    $("#btnAnular").on("click", anular_factura);
    $("#btnAceptar").on("click", aceptar);
    $("#btnSalir").on("click", cancelar);
    $("#btnAcceder").on("click", validar_acceso);
    $("#btnCancelar").on("click", cancelar_acceso);
    $("#btnAtras").on("click", flecha_atras);
    $("#btnAdelante").on("click", flecha_siguiente);
    
    $("#ruc_ci").on("keyup", limpiar_campo);
    $("#nombre_cliente").on("keyup", limpiar_campo2);
    $("#codigo").on("keyup", limpiar_campo3);
    $("#producto").on("keyup", limpiar_campo4);
    
    /////////////////////////////
    $("#codigo").on("keyup", enter);
    $("#producto").on("keyup", enter);
    $("#cantidad").on("keyup", enter);
    $("#p_venta").on("keyup", enter1);
    $("#descuento").on("keyup", enter2);
    $("#num_factura").on("keyup", enter3);
    $("#ruc_ci").on("keyup", enter4);
    
    $("#proforma").on("keyup", agregar_proforma);
    /////////////////////////////////////////

    $("#direccion_cliente").attr("disabled", "disabled");
    $("#telefono_cliente").attr("disabled", "disabled");
    $("#btnAnular").attr("disabled", true);
    $("#btnModificar").attr("disabled", true);
    
    $("#saldo").attr("disabled", "disabled");
    $("#telefono_cliente").validCampoFranz("0123456789");
    $("#telefono_cliente").attr("maxlength", "10");
    $("#ruc_ci").attr("maxlength", "13");
    $("#saldo").attr("maxlength", "9");
    
    $("#series").dialog(dialogo);
    $("#buscar_facturas_venta").dialog(dialogo2);
    $("#clave_permiso").dialog(dialogo3);
    $("#seguro").dialog(dialogo4);

    $("#btnBuscar").click(function (){
        $("#buscar_facturas_venta").dialog("open");   
    })
      
    $("#saldo").keypress(function(e) {
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
    
        //////////////////buscar productos codigo////////////////
    $("#codigo").keyup(function(e) {
     var precio = $("#tipo_precio").val(); 
     if (precio === "MINORISTA") {
            $("#codigo").autocomplete({
                source: "../procesos/buscar_producto9.php?tipo_precio=" + precio,
                minLength: 1,
                focus: function(event, ui) {
                $("#codigo").val(ui.item.value);
                $("#producto").val(ui.item.producto);
                $("#p_venta").val(ui.item.p_venta);
                $("#disponibles").val(ui.item.disponibles);
                $("#iva_producto").val(ui.item.iva_producto);
                $("#carga_series").val(ui.item.carga_series);
                $("#cod_producto").val(ui.item.cod_producto);
                $("#des").val(ui.item.des);
                $("#inventar").val(ui.item.inventar);
                return false;
                },
                select: function(event, ui) {
                $("#codigo").val(ui.item.value);
                $("#producto").val(ui.item.producto);
                $("#p_venta").val(ui.item.p_venta);
                $("#disponibles").val(ui.item.disponibles);
                $("#iva_producto").val(ui.item.iva_producto);
                $("#carga_series").val(ui.item.carga_series);
                $("#cod_producto").val(ui.item.cod_producto);
                $("#des").val(ui.item.des);
                $("#inventar").val(ui.item.inventar);
                $("#descuento").val("");
                $("#descuento").spinner({
                    min: 0, 
                    max: $("#des").val()
                    });
                return false;
                }

                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>")
                .append("<a>" + item.value + "</a>")
                .appendTo(ul);
            };
        } else {
            if (precio === "MAYORISTA") {
                $("#codigo").autocomplete({
                    source: "../procesos/buscar_producto9.php?tipo_precio=" + precio,
                    minLength: 1,
                    focus: function(event, ui) {
                    $("#codigo").val(ui.item.value);
                    $("#producto").val(ui.item.producto);
                    $("#p_venta").val(ui.item.p_venta);
                    $("#disponibles").val(ui.item.disponibles);
                    $("#iva_producto").val(ui.item.iva_producto);
                    $("#carga_series").val(ui.item.carga_series);
                    $("#cod_producto").val(ui.item.cod_producto);
                    $("#des").val(ui.item.des);
                    $("#inventar").val(ui.item.inventar);
                    return false;
                    },
                    select: function(event, ui) {
                    $("#codigo").val(ui.item.value);
                    $("#producto").val(ui.item.producto);
                    $("#p_venta").val(ui.item.p_venta);
                    $("#disponibles").val(ui.item.disponibles);
                    $("#iva_producto").val(ui.item.iva_producto);
                    $("#carga_series").val(ui.item.carga_series);
                    $("#cod_producto").val(ui.item.cod_producto);
                    $("#des").val(ui.item.des);
                    $("#inventar").val(ui.item.inventar);
                    $("#descuento").val("");
                    $("#descuento").spinner({
                        min: 0, 
                        max: $("#des").val()
                        });
                    return false;
                    }
                    }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    return $("<li>")
                    .append("<a>" + item.value + "</a>")
                    .appendTo(ul);
                };
            }
        }
    });
    /////////////////////////////////////////////////////////
    
    //////////////////buscar productos articulo////////////////
    $("#producto").keyup(function(e) {
      var precio = $("#tipo_precio").val();
              if (precio === "MINORISTA") {
            $("#producto").autocomplete({
                source: "../procesos/buscar_producto10.php?tipo_precio=" + precio,
                minLength: 1,
                focus: function(event, ui) {
                $("#producto").val(ui.item.value);
                $("#codigo").val(ui.item.codigo);
                $("#p_venta").val(ui.item.p_venta);
                $("#disponibles").val(ui.item.disponibles);
                $("#iva_producto").val(ui.item.iva_producto);
                $("#carga_series").val(ui.item.carga_series);
                $("#cod_producto").val(ui.item.cod_producto);
                $("#des").val(ui.item.des);
                $("#inventar").val(ui.item.inventar);
                return false;
                },
                select: function(event, ui) {
                $("#producto").val(ui.item.value);
                $("#codigo").val(ui.item.codigo);
                $("#p_venta").val(ui.item.p_venta);
                $("#disponibles").val(ui.item.disponibles);
                $("#iva_producto").val(ui.item.iva_producto);
                $("#carga_series").val(ui.item.carga_series);
                $("#cod_producto").val(ui.item.cod_producto);
                $("#des").val(ui.item.des);
                $("#inventar").val(ui.item.inventar);
                $("#descuento").val("");
                $("#descuento").spinner({
                    min: 0, 
                    max: $("#des").val()
                    });
                return false;
                }

                }).data("ui-autocomplete")._renderItem = function(ul, item) {
                return $("<li>")
                .append("<a>" + item.value + "</a>")
                .appendTo(ul);
            };
        } else {
            if (precio === "MAYORISTA") {
                $("#producto").autocomplete({
                    source: "../procesos/buscar_producto10.php?tipo_precio=" + precio,
                    minLength: 1,
                    focus: function(event, ui) {
                    $("#producto").val(ui.item.value);
                    $("#codigo").val(ui.item.codigo);
                    $("#p_venta").val(ui.item.p_venta);
                    $("#disponibles").val(ui.item.disponibles);
                    $("#iva_producto").val(ui.item.iva_producto);
                    $("#carga_series").val(ui.item.carga_series);
                    $("#cod_producto").val(ui.item.cod_producto);
                    $("#des").val(ui.item.des);
                    $("#inventar").val(ui.item.inventar);
                    return false;
                    },
                    select: function(event, ui) {
                    $("#producto").val(ui.item.value);
                    $("#codigo").val(ui.item.codigo);
                    $("#p_venta").val(ui.item.p_venta);
                    $("#disponibles").val(ui.item.disponibles);
                    $("#iva_producto").val(ui.item.iva_producto);
                    $("#carga_series").val(ui.item.carga_series);
                    $("#cod_producto").val(ui.item.cod_producto);
                    $("#des").val(ui.item.des);
                    $("#inventar").val(ui.item.inventar);
                    $("#descuento").val("");
                    $("#descuento").spinner({
                        min: 0, 
                        max: $("#des").val()
                        });
                    return false;
                    }

                    }).data("ui-autocomplete")._renderItem = function(ul, item) {
                    return $("<li>")
                    .append("<a>" + item.value + "</a>")
                    .appendTo(ul);
                };
            }
        }
    });
    
     ///////////////////limpiar combo//////////
    $("#tipo_precio").change(function() {
    $("#cod_producto").val("");
    $("#codigo").val("");
    $("#producto").val("");
    $("#cantidad").val("");
    $("#p_venta").val("");
    $("#descuento").val("");
    $("#disponibles").val("");
    $("#inventar").val(""); 
    });
    /////////////////////////////////////////

 
    /////buscador cliente identificacion///// 
    $("#ruc_ci").autocomplete({
        source: "../procesos/buscar_cliente.php",
        minLength: 1,
        focus: function(event, ui) {
        $("#ruc_ci").val(ui.item.value);
        $("#id_cliente").val(ui.item.id_cliente);
        $("#nombre_cliente").val(ui.item.nombre_cliente);
        $("#direccion_cliente").val(ui.item.direccion_cliente);
        $("#telefono_cliente").val(ui.item.telefono_cliente);
        $("#saldo").val(ui.item.saldo);
        return false;
        },
        select: function(event, ui) {
        $("#ruc_ci").val(ui.item.value);
        $("#id_cliente").val(ui.item.id_cliente);
        $("#nombre_cliente").val(ui.item.nombre_cliente);
        $("#direccion_cliente").val(ui.item.direccion_cliente);
        $("#telefono_cliente").val(ui.item.telefono_cliente);
        $("#saldo").val(ui.item.saldo);
        $("#direccion_cliente").attr("disabled", "disabled");
        $("#telefono_cliente").attr("disabled", "disabled");
        $("#saldo").attr("disabled", "disabled");
        return false;
        }

        }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>")
        .append("<a>" + item.value + "</a>")
        .appendTo(ul);
    };
    ////////////////////////////////////////////////
    
    /////buscador cliente nombres///// 
    $("#nombre_cliente").autocomplete({
        source: "../procesos/buscar_cliente_nombre.php",
        minLength: 1,
        focus: function(event, ui) {
        $("#nombre_cliente").val(ui.item.value);
        $("#id_cliente").val(ui.item.id_cliente);
        $("#ruc_ci").val(ui.item.ruc_ci);
        $("#direccion_cliente").val(ui.item.direccion_cliente);
        $("#telefono_cliente").val(ui.item.telefono_cliente);
        $("#saldo").val(ui.item.saldo);
        return false;
        },
        select: function(event, ui) {
        $("#nombre_cliente").val(ui.item.value);
        $("#id_cliente").val(ui.item.id_cliente);
        $("#ruc_ci").val(ui.item.ruc_ci);
        $("#direccion_cliente").val(ui.item.direccion_cliente);
        $("#telefono_cliente").val(ui.item.telefono_cliente);
        $("#saldo").val(ui.item.saldo);
        $("#direccion_cliente").attr("disabled", "disabled");
        $("#telefono_cliente").attr("disabled", "disabled");
        $("#saldo").attr("disabled", "disabled");
        return false;
        }
        }).data("ui-autocomplete")._renderItem = function(ul, item) {
        return $("<li>")
        .append("<a>" + item.value + "</a>")
        .appendTo(ul);
    };
    ////////////////////////////////////////////////

    ///////////////////////////////////////////////
    //
    /////valores meses desglose////////////////////
    $("#meses").spinner({
        min: 1, 
        max: 3
    });
    /////////////////////////////////////////

    /////////////////////////////////
    $("#cantidad").validCampoFranz("0123456789");
    $("#descuento").validCampoFranz("0123456789");
    $("#num_factura").validCampoFranz("0123456789");
    $("#num_factura").attr("maxlength", "9");
    $("#ruc_ci").validCampoFranz("0123456789");
    /////////////////////////////////////

    //////////atributos////////////
    $("#adelanto").attr("disabled", "disabled");
    $("#meses").attr("disabled", "disabled");
    $("#cuotas").attr("disabled", "disabled");
    /////////////////////////////////

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

    ///////////adelanto//////////////
    $("#adelanto").keypress(function(e) {
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
    //////////////////////////////

    $('.ui-spinner-button').click(function() {
        $(this).siblings('input').change();
    });

    //////////////////calcular meses/////////
    $("#meses").change(function() {
        var meses = $("#meses").val();
        $('#cuotas').children().remove().end();
        if ($("#formas").val() === "Contado") {
            alert("Error...No se puede diferer");
            $("#meses").val("");
        } else {
            if ($("#formas").val() === "Credito") {
                if (meses > 1) {
                    if($("#adelanto").val() !== "")
                    {
                        var resta = ($("#tot").val() - $("#adelanto").val());
                        for ( var i = 1; i <= meses - 1; i++) {
                            var calcu = resta / (meses);
                            var entero = Math.floor(calcu).toFixed(2);
                            $("#cuotas").append('<option>'+entero+'</option>'); 
                        }
                        var calcu1 = entero * (meses - 1);
                        var sal = resta - calcu1;
                        var entero2 = sal.toFixed(2);
                        $("#cuotas").append('<option>'+entero2+'</option>'); 
                    }else{
                        var to = $("#tot").val();
                        for (i = 1; i <= meses - 1; i++) {
                            calcu = to / (meses);
                            entero = Math.floor(calcu).toFixed(2);
                            $("#cuotas").append('<option>'+entero+'</option>'); 
                        }
                        calcu1 = entero * (meses - 1);
                        sal = to - calcu1;
                        entero2 = sal.toFixed(2);
                        $("#cuotas").append('<option>'+entero2+'</option>'); 
                    }
                }else{
                    if($("#adelanto").val() !== "")
                    {
                        resta = ($("#tot").val() - $("#adelanto").val());
                        var redo = parseFloat(resta).toFixed(2);
                        $("#cuotas").append('<option>'+redo+'</option>');  
                    }else{
                        to = $("#tot").val();
                        redo = parseFloat(to).toFixed(2);
                        $("#cuotas").append('<option>'+redo+'</option>'); 
                    }
                }
            }
        }
    });
    /////////////////////////////////////////

    //////////////////calcular descuento/////////
    $("#descuento").change(function() {
        if ($("#cod_producto").val() === "") {
            alert("Error...Seleccione un producto");
            $("#descuento").val(0);
            $("#codigo").val("");
        }
    });
    /////////////////////////////////////////

    /////////series//////////////
    $("#formas").change(function() {
        var tam2 = jQuery("#list").jqGrid("getRowData");
        if ($("#formas").val() === "Contado") {
            $("#adelanto").attr("disabled", "disabled");
            $("#adelanto").val("");
            $("#meses").attr("disabled", "disabled");
            $("#meses").val("");
            $("#cuotas").attr("disabled", "disabled");
            $('#cuotas').children().remove().end();
        } else {
            if ($("#formas").val() === "Credito") {
                if (tam2.length > 0) {
                    $("#adelanto").removeAttr("disabled");
                    $("#meses").removeAttr("disabled");
                    $("#cuotas").removeAttr("disabled");
                } else {
                    alert("Error...Ingrese un monto a la factura");
                    $("#formas option[value=" + 'Contado' + "]").attr("selected", true);
                }
            }
        }
    });
    ///////////////////////////////////

    ///////////calendarios////////////
    $("#fecha_actual").datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $("#cancelacion").datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $("#fecha_auto").datepicker({
        dateFormat: 'yy-mm-dd'
    });
    $("#fecha_caducidad").datepicker({
        dateFormat: 'yy-mm-dd'
    });
  
//////////////////////////////////

///////////tabla local/////////////   
    var can;
    jQuery("#list").jqGrid({
        datatype: "local",
        colNames: ['', 'ID', 'Código', 'Producto', 'Cantidad', 'PVP', 'Descuento', 'Total', 'Iva', 'Pendientes'],
        colModel: [
            {name: 'myac', width: 50, fixed: true, sortable: false, resize: false, formatter: 'actions',
                formatoptions: {keys: false, delbutton: true, editbutton: false}
            },
            {name: 'cod_producto', index: 'cod_producto', editable: false, search: false, hidden: true, editrules: {edithidden: false}, align: 'center',
                frozen: true, width: 50},
            {name: 'codigo', index: 'codigo', editable: false, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',
                frozen: true, width: 100},
            {name: 'detalle', index: 'detalle', editable: false, frozen: true, editrules: {required: true}, align: 'center', width: 290},
            {name: 'cantidad', index: 'cantidad', editable: false, frozen: true, editrules: {required: true}, align: 'center', width: 70},
            {name: 'precio_u', index: 'precio_u', editable: false, search: false, frozen: true, editrules: {required: true}, align: 'center', width: 110},
            {name: 'descuento', index: 'descuento', editable: false, frozen: true, editrules: {required: true}, align: 'center', width: 90},
            {name: 'total', index: 'total', editable: false, search: false, frozen: true, editrules: {required: true}, align: 'center', width: 150},
            {name: 'iva', index: 'iva', align: 'center', width: 100, hidden: true},
            {name: 'pendiente', index: 'pendiente', editable: false, frozen: true, editrules: {required: true}, align: 'center', width: 90}
        ],
        rowNum: 30,
        width: 780,
        sortable: true,
        rowList: [10, 20, 30],
        pager: jQuery('#pager'),
        sortname: 'id_productos',
        sortorder: 'asc',
        viewrecords: true,
        cellEdit: true,
        cellsubmit: 'clientArray',
        shrinkToFit: true,
        delOptions: {
            modal: true,
            jqModal: true,
            onclickSubmit: function(rp_ge, rowid) {
                var id = jQuery("#list").jqGrid('getGridParam', 'selrow');
                jQuery('#list').jqGrid('restoreRow', id);
                var ret = jQuery("#list").jqGrid('getRowData', id);
                
                rp_ge.processing = true;
                var su = jQuery("#list").jqGrid('delRowData', rowid);
                var tarifa12 = 0;
                var tarifa0 = 0;
                var iva = 0;
                var total_iva = 0;
                var mul = 0;
                var des = 0;
                var total_des = 0;
                var total = 0;
                var total_to = 0;
                var total_to2 = 0;
                if (su === true) {
                      $.ajax({
                        type: "POST",
                        url: "../procesos/eliminar_series2.php",
                        data: "codigo=" + ret.cod_producto + "&comprobante=" + $("#comprobante").val(),
                        success: function(data) {
                          var  val = data;
                            if (val == 1){
                               }
                        }
                    });
                     
                    if (ret.iva === "Si") {
                        tarifa12 = ($("#total_p2").val() - ret.total).toFixed(2);
                        $("#total_p2").val(tarifa12);
                        iva = $("#iva").val();
                        total_iva = ((ret.total * 12) / 100).toFixed(2);
                        iva = ($("#iva").val() - total_iva).toFixed(2);
                        $("#iva").val(iva);
                        mul = (ret.cantidad * ret.precio_u).toFixed(2);
                        des = ((mul * ret.descuento)/100).toFixed(2);
                        total_des = (parseFloat($("#desc").val()) - des).toFixed(2);
                        total = (parseFloat(ret.total) + parseFloat(total_iva)).toFixed(2);
                        total_to = ($("#tot").val() - total).toFixed(2);
                        $("#desc").val(total_des);
                        $("#tot").val(total_to);
                    } else {
                        if (ret.iva === "No") {
                            tarifa0 = ($("#total_p").val() - ret.total).toFixed(2);
                            $("#total_p").val(tarifa0);
                            mul = (ret.cantidad * ret.precio_u).toFixed(2);
                            des = ((mul * ret.descuento)/100).toFixed(2);
                            total_des = (parseFloat($("#desc").val()) - des).toFixed(2);
                            total_to2 = ($("#tot").val() - ret.total).toFixed(2);
                            $("#desc").val(total_des);
                            $("#tot").val(total_to2);
                        }
                    }
                }
                $(".ui-icon-closethick").trigger('click');
                return true;
            },
            processing: true
        }
    });
    //////////////////////////////////////

     ////////////////////buscador facturas vetas/////////////////////////
        jQuery("#list2").jqGrid({
        url: '../xml/xmlBuscarFacturaVenta.php',
        datatype: 'xml',
        colNames: ['ID','IDENTIFICACIÓN','CLIENTE', 'FACTURA NRO.','MONTO TOTAL','FECHA'],
        colModel: [
            {name: 'id_factura_venta', index: 'id_factura_venta', editable: false, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 50},
            {name: 'identificacion', index: 'identificacion', editable: false, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 150},
            {name: 'nombres_cli', index: 'nombres_cli', editable: true, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 200},
            {name: 'num_factura', index: 'num_factura', editable: true, search: true, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 200},
            {name: 'total_venta', index: 'total_venta', editable: true, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 100},
            {name: 'fecha_actual', index: 'fecha_actual', editable: true, search: false, hidden: false, editrules: {edithidden: false}, align: 'center',frozen: true, width: 100},
        ],
        rowNum: 30,
        width: 750,
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
        
        if (id) {
           var ret = jQuery("#list2").jqGrid('getRowData', id);
           var valor = ret.id_factura_venta;
         /////////////agregregar datos factura////////
            $("#comprobante").val(ret.id_factura_venta);
            $("#btnGuardar").attr("disabled", true);
            $("#btnModificar").attr("disabled", true);
            $("#num_factura").attr("disabled", "disabled");
            $("#ruc_ci").attr("disabled", "disabled");
            $("#nombre_cliente").attr("disabled", "disabled");
            $("#codigo").attr("disabled", "disabled");
            $("#producto").attr("disabled", "disabled");
            $("#cantidad").attr("disabled", "disabled");
            $("#p_venta").attr("disabled", "disabled");
            $("#btncargar").attr("disabled", "disabled");
            $("#autorizacion").attr("disabled", "disabled");
            $("#estado h3").remove();
            $("#formas").val("Contado");
            $("#adelanto").val("");
            $("#meses").val("");
            $('#cuotas').children().remove().end();
            $("#cuotas").attr("disabled", true); 
            $("#list").jqGrid("clearGridData", true);
            $("#total_p").val("0.00");
            $("#total_p2").val("0.00");
            $("#iva").val("0.00");
            $("#desc").val("0.00");
            $("#tot").val("0.00");
            $.getJSON('../procesos/retornar_factura_venta.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 22)
                    {
                         $("#fecha_actual").val(data[i]);
                    $("#hora_actual").val(data[i + 1 ]);
                    $("#digitador").val(data[i + 2 ] + " " + data[i + 3 ] );
                    var num = data[i + 4]; 
                    var res = num.substr(8, 20)
                    $("#num_factura").val(res);
                    $("#id_cliente").val(data[i + 5]);
                    $("#ruc_ci").val(data[i + 6]);
                    $("#nombre_cliente").val(data[i + 7]);
                    $("#direccion_cliente").val(data[i + 8]);
                    $("#telefono_cliente").val(data[i + 9]);
                    $("#saldo").val(data[i + 10]);
                    $("#cancelacion").val(data[i + 11]);
                    $("#autorizacion").val(data[i + 12]);
                    $("#fecha_auto").val(data[i + 13]);
                    $("#fecha_caducidad").val(data[i + 14]);
                    
                    $("#tipo_precio").val(data[i + 15]);
                    if(data[ i+ 16 ] == "Pasivo"){
                        $("#estado").append($("<h3>").text("Anulada"));
                        $("#estado h3").css("color","red");
                        $("#btnAnular").attr("disabled", "disabled");
                    }else{
                        $("#estado h3").remove();
                        $("#btnAnular").attr("disabled", "disabled");
                        $("#btnAnular").attr("disabled", false);
                    }
                    
                     $("#total_p").val(data[i + 17]);
                     $("#total_p2").val(data[i + 18]);
                     $("#iva").val(data[i + 19]);
                     $("#desc").val(data[i + 20]);
                     $("#tot").val(data[i + 21]);
                   }
                }
            });
            ///////////////////////////////////////////////////   
    
            ///////////////////llamar facturas flechas segunda parte/////
            $.getJSON('../procesos/retornar_factura_venta_credito.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 4)
                {
                    $("#formas").val(data[i]);
                    $("#adelanto").val(data[i + 1 ]);
                    $("#meses").val(data[i + 2 ]);
                    
                    //////////calcular meses//////////
                    if (data[i + 2 ] > 1) {
                        $("#cuotas").attr("disabled", false); 
                    for (var j = 1; j <= data[i + 2 ] - 1; j++) {
                         var calcu = data[i + 3] / (data[i + 2]);
                         var entero = Math.floor(calcu).toFixed(2);
                         $("#cuotas").append('<option>'+entero+'</option>'); 
                    }
                    var calcu1 = entero * (data[i + 2 ] - 1);
                    var sal = data[i + 3] - calcu1;
                    var entero2 = sal.toFixed(2);
                    $("#cuotas").append('<option>'+entero2+'</option>'); 

                }else{
                  $("#cuotas").attr("disabled", false); 
                  $("#cuotas").append('<option>'+data[i + 3]+'</option>');  
                }
               }
              }
            });
            /////////////////////////////////////////////////////////
    
            ////////////////////llamar facturas flechas tercera parte/////
            $.getJSON('../procesos/retornar_factura_venta2.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 9)
                    {
                        var datarow = {
                            cod_producto: data[i], 
                            codigo: data[i + 1], 
                            detalle: data[i + 2], 
                            cantidad: data[i + 3], 
                            precio_u: data[i + 4], 
                            descuento: data[i + 5], 
                            total: data[i + 6], 
                            iva: data[i + 7],
                            pendiente: data[i + 8]
                            };
                        var su = jQuery("#list").jqGrid('addRowData', data[i], datarow);
                    }
                }
            });
            $("#buscar_facturas_venta").dialog("close");
        }
        else {
            alert("Seleccione una cuenta");
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
           var valor = ret.id_factura_venta;
         /////////////agregregar datos factura////////
            $("#comprobante").val(ret.id_factura_venta);
            $("#btnGuardar").attr("disabled", true);
            $("#btnModificar").attr("disabled", true);
            $("#num_factura").attr("disabled", "disabled");
            $("#ruc_ci").attr("disabled", "disabled");
            $("#nombre_cliente").attr("disabled", "disabled");
            $("#codigo").attr("disabled", "disabled");
            $("#producto").attr("disabled", "disabled");
            $("#cantidad").attr("disabled", "disabled");
            $("#p_venta").attr("disabled", "disabled");
            $("#btncargar").attr("disabled", "disabled");
            $("#autorizacion").attr("disabled", "disabled");
            $("#estado h3").remove();
            $("#formas").val("Contado");
            $("#adelanto").val("");
            $("#meses").val("");
            $('#cuotas').children().remove().end();
            $("#cuotas").attr("disabled", true); 
            $("#list").jqGrid("clearGridData", true);
            $("#total_p").val("0.00");
            $("#total_p2").val("0.00");
            $("#iva").val("0.00");
            $("#desc").val("0.00");
            $("#tot").val("0.00");
            $.getJSON('../procesos/retornar_factura_venta.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 22)
                    {
                         $("#fecha_actual").val(data[i]);
                    $("#hora_actual").val(data[i + 1 ]);
                    $("#digitador").val(data[i + 2 ] + " " + data[i + 3 ] );
                    var num = data[i + 4]; 
                    var res = num.substr(8, 20)
                    $("#num_factura").val(res);
                    $("#id_cliente").val(data[i + 5]);
                    $("#ruc_ci").val(data[i + 6]);
                    $("#nombre_cliente").val(data[i + 7]);
                    $("#direccion_cliente").val(data[i + 8]);
                    $("#telefono_cliente").val(data[i + 9]);
                    $("#saldo").val(data[i + 10]);
                    $("#cancelacion").val(data[i + 11]);
                    $("#autorizacion").val(data[i + 12]);
                    $("#fecha_auto").val(data[i + 13]);
                    $("#fecha_caducidad").val(data[i + 14]);
                    
                    $("#tipo_precio").val(data[i + 15]);
                    if(data[ i+ 16 ] == "Pasivo"){
                        $("#estado").append($("<h3>").text("Anulada"));
                        $("#estado h3").css("color","red");
                        $("#btnAnular").attr("disabled", "disabled");
                    }else{
                        $("#estado h3").remove();
                        $("#btnAnular").attr("disabled", "disabled");
                        $("#btnAnular").attr("disabled", false);
                    }
                    
                     $("#total_p").val(data[i + 17]);
                     $("#total_p2").val(data[i + 18]);
                     $("#iva").val(data[i + 19]);
                     $("#desc").val(data[i + 20]);
                     $("#tot").val(data[i + 21]);
                   }
                }
            });
            ///////////////////////////////////////////////////   
    
            ///////////////////llamar facturas flechas segunda parte/////
            $.getJSON('../procesos/retornar_factura_venta_credito.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                    for (var i = 0; i < tama; i = i + 4)
                {
                    $("#formas").val(data[i]);
                    $("#adelanto").val(data[i + 1 ]);
                    $("#meses").val(data[i + 2 ]);
                    
                    //////////calcular meses//////////
                    if (data[i + 2 ] > 1) {
                        $("#cuotas").attr("disabled", false); 
                    for (var j = 1; j <= data[i + 2 ] - 1; j++) {
                         var calcu = data[i + 3] / (data[i + 2]);
                         var entero = Math.floor(calcu).toFixed(2);
                         $("#cuotas").append('<option>'+entero+'</option>'); 
                    }
                    var calcu1 = entero * (data[i + 2 ] - 1);
                    var sal = data[i + 3] - calcu1;
                    var entero2 = sal.toFixed(2);
                    $("#cuotas").append('<option>'+entero2+'</option>'); 

                }else{
                  $("#cuotas").attr("disabled", false); 
                  $("#cuotas").append('<option>'+data[i + 3]+'</option>');  
                }
               }
              }
            });
            /////////////////////////////////////////////////////////
    
            ////////////////////llamar facturas flechas tercera parte/////
            $.getJSON('../procesos/retornar_factura_venta2.php?com=' + valor, function(data) {
                var tama = data.length;
                if (tama !== 0) {
                     for (var i = 0; i < tama; i = i + 9)
                         {
                        var datarow = {
                            cod_producto: data[i], 
                            codigo: data[i + 1], 
                            detalle: data[i + 2], 
                            cantidad: data[i + 3], 
                            precio_u: data[i + 4], 
                            descuento: data[i + 5], 
                            total: data[i + 6], 
                            iva: data[i + 7],
                            pendiente: data[i + 8]
                            };
                        var su = jQuery("#list").jqGrid('addRowData', data[i], datarow);
                    }
                }
            });
            $("#buscar_facturas_venta").dialog("close");
        }
        else {
            alert("Seleccione una cuenta");
        }
    }
});

 //////////////////////series factura venta/////////////////////////
    jQuery("#list3").jqGrid({
        datatype: "local",
        colNames: ['', 'cod_serie', 'Series'],
        colModel: [
            {name: 'myac', width: 50, fixed: true, sortable: false, resize: false, formatter: 'actions',
                formatoptions: {keys: false, delbutton: true, editbutton: false}
            },
            {name: 'id_series', index: 'id_series', editable: false, search: false, hidden: true, editrules: {edithidden: false}, align: 'center',
                frozen: true, width: 50},
            {name: 'serie', index: 'serie', editable: false, search: false, hidden: false, editrules: {edithidden: true}, align: 'center',
                frozen: true, width: 100}
        ],
        rowNum: 30,
        width: 450,
        sortable: true,
        rowList: [10, 20, 30],
        pager: jQuery('#pager3'),
        sortname: 'id_series',
        sortorder: 'asc',
        viewrecords: true,
        cellEdit: true,
        cellsubmit: 'clientArray',
        shrinkToFit: true,
        delOptions: {
            onclickSubmit: function(rp_ge, rowid) {
                rp_ge.processing = true;
                var su = jQuery("#list3").jqGrid('delRowData', rowid);
                if (su === true) {
                    $("#delmodlist3").hide();
                    return true;
                }
                //$(".ui-icon-closethick").trigger('click');
            },
            processing: true
        }
    }).jqGrid('navGrid', '#pager3',
            {
                add: false,
                edit: false,
                del: false,
                refresh: true,
                search: true,
                view: true
            });
}




