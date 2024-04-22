<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Juego</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="css/css_index.css" media="screen" />
        <script src="jquery-3.4.1.min.js"></script>
        <script src="js/index.js"></script>
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        
        <main>
            <div class="container">
                <h1>Iniciar Sesión</h1>
                <form id="inicioSesion" action="controlador/controlador.php" method="POST">
                    <div class="form-group">
                        <label for="email">Usuario:</label>
                        <input type="text"class="form-control" id="usuario" name="usuario" placeholder="usuario@x.x"><br>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Contraseña:</label>
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Contraseña"><br>
                    </div>
                    <div class="form-group">
                        <input type="button" id="regis" class="btn btn-primary" value="Registrarse">
                        <a id="olvidar" href="vista/olvidarPwd.php">He olvidado la contraseña</a>
                        <input type="submit" class="btn btn-primary" id="aceptar" name="aceptarIndex" value="Aceptar">
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>