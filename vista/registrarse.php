<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Registrarse</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Course CSS -->
        <link rel="stylesheet" type="text/css" href="../css/css_registrarse.css" media="screen" />
       
        <script src="../jquery-3.4.1.min.js"></script>
<!--        <script src="../js/registrarse.js"></script>-->
        <script>
            function goBack(){
                window.history.back();
            }
        </script>
    </head>
    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


        <h1 class="h1">Registrarse</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="form-inline" action="../controlador/controlador.php" method="POST">
                        <div class="row justify-content-center">
                            <div class="col border border-primary ">
                                <div class="form-group">
                                    <label class="col-label-sm">Correo:*</label>
                                    <input type="email" class="form-control form-control-sm" name="correo" placeholder="usuario"/> 
                                </div>
                                <div class="form-group">
                                    <label class="col-label-sm">Contraseña:*</label>
                                    <input type="password" class="form-control form-control-sm" name="clave" placeholder="password"/> 
                                </div>
                                <div class="form-group">
                                    <label class="col-label-sm">Confirmar contraseña:*</label>
                                    <input type="password" class="form-control form-control-sm" name="reclave" placeholder="password" /> 
                                </div>
                                <div class="form-group">
                                    <label class="col-label-sm">Nombre:</label>
                                    <input type="text" class="form-control form-control-sm" name="nombre" placeholder="Nombre" pattern="[A-Za-z]{1,50}"/> 
                                </div>
                                <div class="form-group">
                                    <label class="col-label-sm">Apellido:</label>
                                    <input type="text" class="form-control form-control-sm" name="apellido" placeholder="Apellido" pattern="[A-Za-z]{1,50}"/> 
                                </div>
                                <div class="text-right ">
                                    <input type="submit" class="btn btn-primary" name="registrar" value="Registrar" />
                                    <input type="button" class="btn btn-primary" id="limpiar" value="Limpiar">
                                    <input type="button" class="btn btn-primary" name="volver" value="Volver" onclick="goBack()">
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </body>
</html>