<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Crud usuarios</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Course CSS -->
        <!--<link rel="stylesheet" href="styles.css" />-->
        <style>
            button#editar{
                background-image: url("../img/iconos/editar.png");
                border:none;
                background-repeat: no-repeat;
            }
            button#eliminar{
                background-image: url("../img/iconos/bor.png");
                border:none;
                background-repeat: no-repeat;
            }
        </style>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </head>
    <body>
        <table>
            <caption>LISTA USUARIOS</caption>
            <thead>
                <tr>
                    <th>CORREO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>ROL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../clase/Conexion.php';
                require_once '../clase/Usuario.php';
                $v = Conexion::obtenerUsuarios();
                for ($i = 0; $i < count($v); $i++) {
                    ?>
                <form action="../controlador/controlador.php" method="POST">
                    <tr>
                        <td>
                            <input type="text" name="correo" value="<?php echo $v[$i]->getCorreo(); ?>" readonly/>
                        </td> 
                        <td>
                            <input type="text"  name="nombre" pattern="[A-Za-z]{1,50}" value="<?php echo $v[$i]->getNombre(); ?>"/>
                        </td>   
                        <td>
                            <input type="text"  name="apellido" pattern="[A-Za-z]{1,50}" value="<?php echo $v[$i]->getApellido(); ?>"/>
                        </td>
                        <td>
                            <input type="number" name="rol" min="0" max="1" pattern="[0-9]{1}"value="<?php echo $v[$i]->getRol(); ?>"/>
                        </td>
                        <td>
                            <input type="submit" id="eliminar" name="botUsuario" value="X"/>
                        </td>
                        <td>
                            <input type="submit" id="editar" name="botUsuario" value="Editar"/>
                        </td>
                    </tr>
                </form>
                <?php
            }
            ?>
            <tr>
                <td>
                    <input type="button" id="volver" value="Volver" onclick="goBack()"/>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>