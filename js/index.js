$(document).on("ready", inicio);

var dialogo =
{
    autoOpen: false,
    resizable: false,
    width: 500,
    height: 600,
    modal: true
};

function cancelar(){
    $("#crear_empresa").dialog("close");  
    $("#txt_usuario").val("");
    $("#txt_contra").val("");
}


function guardar_empresa(){
    if ($("#nombre_empresa").val() === "") {
        $("#nombre_empresa").focus();
        alert("Ingrese nombre de la empresa");
    } else {
        if ($("#ruc_empresa").val() === "") {
            $("#ruc_empresa").focus();
            alert("Ingrese ruc de la empresa");
        }else{
            if ($("#direccion_empresa").val() === "") {
                $("#direccion_empresa").focus();
                alert("Ingrese dirección de la empresa");
            }else{
                if ($("#telefono_empresa").val() === "") {
                    $("#telefono_empresa").focus();
                    alert("Ingrese telefóno de la empresa");
                }else{
                    $.ajax({
                        type: "POST",
                        url: "../procesos/guardar_empresa.php",
                        data: "nombre_empresa=" + $("#nombre_empresa").val() + "&ruc_empresa=" + $("#ruc_empresa").val() + "&direccion_empresa=" + $("#direccion_empresa").val() +
                        "&telefono_empresa=" + $("#telefono_empresa").val() + "&celular_empresa=" + $("#celular_empresa").val() + "&fax_empresa=" + $("#fax_empresa").val() + "&correo_empresa=" + $("#correo_empresa").val() + "&pagina_empresa=" + $("#pagina_empresa").val(),
                        success: function(data) {
                            var val = data;
                            if (val == 1)
                            {
                                alert("Empresa guardada Correctamente");
                                location.reload();
                            }
                        }
                    });
                }
            }
        }
        
    }
}


function inicio()
{
    $("#ruc_empresa").validCampoFranz("0123456789");
    $("#telefono_empresa").validCampoFranz("0123456789");
    $("#celular_empresa").validCampoFranz("0123456789");
    $("#ruc_empresa").attr("maxlength", "13");
    
    $("#btnIngreso").click(function(e) {
        e.preventDefault();
    });
    $("#btnGuardar").click(function(e) {
        e.preventDefault();
    });
    $("#btnCancelar").click(function(e) {
        e.preventDefault();
    });
    
    ////////////eventos botones/////////////
    $("#btnCancelar").on("click", cancelar);
    $("#btnGuardar").on("click", guardar_empresa);
    //////////////////////////////////////
   
   
   
    ////////////dialogo///////////////
    $("#crear_empresa").dialog(dialogo);
    
    ///////////////////////////////
    $("#txt_usuario").focus();
    $("#txt_contra").on("keyup", enter);
    $("#txt_usuario").on("keyup", enter);
    $("#btnIngreso").on("click", ingresarSistema);
}



function ingresarSistema(e)
{
    e.preventDefault();
    var repe = 0;

    if ($("#txt_usuario").val() === "") {
        alert("Ingrese el usuario");
        $("#txt_usuario").focus();
        repe = 1;
    } else {
        if ($("#txt_contra").val() === "") {
            alert("Ingrese la contraseña");
            $("#txt_contra").focus();
            repe = 1;
        }

        if (repe === 0) {
            $.ajax({
                url: '../procesos/index.php',
                type: 'POST',
                data: "usuario=" + $("#txt_usuario").val() + "&clave=" + $("#txt_contra").val() + "&id_empresa=" + $("#empresa").val(),
                success: function(data) {
                    var val = data;
                    if (val == 1)
                    {
                        if($("#empresa").val() === "" ||$("#empresa").val() === null){
                            if (confirm("Desea crear una nueva empresa") == true) {
                                $("#crear_empresa").dialog("open");  
                            }else{
                                $("#txt_usuario").val("");
                                $("#txt_contra").val("");
                            }
                        }else{
                            window.location.href = "principal.php";  
                        }
                    }else{
                        if (val == 2)
                        {
                            if($("#empresa").val() === "" ||$("#empresa").val() === null){
                                alert("Imposible acceder al sistema"); 
                                $("#txt_usuario").val("");
                                $("#txt_contra").val("");
                            }else{
                                window.location.href = "principal.php";  
                            }
                        }else{
                            if (val == 0)
                            {
                                alert("Error... Los datos son incorrectos ingrese nuevamente");
                                $("#txt_contra").val("")
                                $("#txt_contra").focus();
                            }
                        }
                    }
                   
                }
            });
        }
    }
}

function enter(e) {
    if (event.which === 13 || event.keyCode === 13) {
        ingresarSistema();
        return false;
    }
    return true;

}