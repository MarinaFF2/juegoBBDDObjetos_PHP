$(document).ready(function () {
    
    
    ("#send").blur(function () {
        if ($("#correo").val() === "" && $("#clave").val() === "" && $("#nombre").val() === "" && $("#apellido").val() === "" && $("#reclave").val() === "") {
            if ($("#clave").val() === $("#reclave").val()) {
                location.replace("../index.php");
            }
        }
    });
    $("#reclave").blur(function () {
        if ($("#clave").val() !== $("#reclave").val()) {
            $("#clave").css({'border-color': 'red'});
            $("#reclave").css({'border-color': 'red'});
        } else {
            $("#clave").css({'border-color': 'black'});
            $("#reclave").css({'border-color': 'black'});
        }
        if ($("#reclave").val() !== "") {
            $("#reclave").css({'border-color': 'black'});
        } else {
            $("#reclave").css({'border-color': 'orange'});
        }
    });
    $("#clave").blur(function () {
        if ($("#clave").val() !== $("#reclave").val()) {
            $("#clave").css({'border-color': 'red'});
            $("#reclave").css({'border-color': 'red'});
        } else {
            $("#clave").css({'border-color': 'black'});
            $("#reclave").css({'border-color': 'black'});
        }
        if ($("#clave").val() !== "") {
            $("#clave").css({'border-color': 'black'});
        } else {
            $("#clave").css({'border-color': 'orange'});
        }
    });
    $("#correo").blur(function () {
        if ($("#correo").val() !== "") {
            $("#correo").css({'border-color': 'black'});
        } else {
            $("#correo").css({'border-color': 'red'});
        }
    });
    $("#nombre").blur(function () {
        if ($("#nombre").val() !== "") {

            $("#nombre").css({'border-color': 'black'});
        } else {
            $("#nombre").css({'border-color': 'red'});
        }
    });
    $("#apellido").blur(function () {
        if ($("#apellido").val() !== "") {

            $("#apellido").css({'border-color': 'black'});
        } else {
            $("#apellido").css({'border-color': 'red'});
        }
    });
   
    $("#limpiar").click(function () {
        limpiar1();
    });
    function limpiar1() {
        $("#correo").val("");
        $("#clave").val("");
        $("#reclave").val("");
        $("#nombre").val("");
        $("#apellido").val("");
    }
});