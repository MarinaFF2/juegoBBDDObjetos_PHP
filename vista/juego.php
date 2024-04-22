<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Juego</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../files/bootstrap-4.3.1-dist/css/bootstrap.min.css">
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="../files/jquery-3.3.1.slim.min.js"></script>
        <script src="../files/popper.min.js"></script>
        <script src="../files/bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
        <!--        <link rel="stylesheet" type="text/css" href="../css/css_.css" media="screen" />-->
        <script src="../jquery-3.4.1.min.js"></script>
        <script>
            function goBack(){
                window.history.back();
            }
        </script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <form class="form-inline" action="../controlador/controlador.php" method="POST">
                        <div class="row justify-content-center">
                            <div class="col border border-primary ">
                                <div class="text-right ">
                                    <input type="submit" class="btn btn-primary" name="jugar" value="Jugar" />
                                    <input type="submit" class="btn btn-primary" name="ranking" value="Clasificatoria" />
                                    <input type="submit" class="btn btn-primary" name="volver" value="Volver" onclick="goBack()">
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </body>
</html>