<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Juego</title>
        <link rel="stylesheet" type="text/css" href="../css/css_olvidarContrasenia.css" media="screen" />
        <script>
            function goBack(){
                window.history.back();
            }
        </script>
    </head>
    <body>
        <h1>Recuperar contraseña</h1>
        <form name="olvidoPwd" action="../controlador/controlador.php" method="post">
            <p>Introduce tu correo: </p><input type="text" name="email" placeholder="Introduzca su correo"><br>
            <input class="botones" type="submit" name="botOlvidoPwd" value="Recuperar contraseña"><br>
            <input type="button" id="volverIndex" value="Volver" onclick="goBack()"><br>
        </form>
    </body>
</html>