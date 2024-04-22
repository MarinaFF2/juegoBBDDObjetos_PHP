$(document).ready(function () {
    $("#usuario").val() === "";
    $("#pwd").val() === "";
    $("#aceptar").click(function () {
        if ($("#usuario").val() === "" && $("#pwd").val() === "") {
            location.replace("../index.jsp");
        }
    });
    $("#usuario").blur(function () {
        if ($("#usuario").val() === "") {
            $("#usuario").css({'border-color': 'red'});
        }
    });
    $("#pwd").blur(function () {
        if ($("#pwd").val() === "") {
            location.replace("../index.jsp");
            $("#pwd").css({'border-color': 'red'});
        }
    });
    /**
     * boton del  inicar seion / index para ir a la ventana registrsrse
     */
    $('#regis').click(function () {
        location.replace('vista/registrarse.php');
    });
});