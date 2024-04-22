<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Clasificatoria</title>
        <script>
            function goBack(){
                window.history.back();
            }
        </script>
    </head>
    <body>
        <table>
            <caption>LISTA DE CLASIFICADOS</caption>
            <thead>
                <tr>
                    <th>CLASIFICATORIA</th>
                    <th>CORREO</th>
                    <th>GANADAS</th>
                    <th>PERDIDAS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once '../clase/Conexion.php';
                require_once '../clase/Ranking.php';
                $v = Conexion::obtenerRanking();
                for ($i = 0; $i < count($v); $i++) {
                    ?>
                <form action="../controlador/controlador.php" method="POST">
                    <tr>
                        <td>
                            <input type="text" name="clasificatoria" value="<?php echo $i+1; ?>"  readonly/>
                        </td>
                        <td>
                            <input type="text" name="correo" value="<?php echo $v[$i]->getUsuario(); ?>" readonly/>
                        </td> 
                        <td>
                            <input type="text" name="ganadas" value="<?php echo $v[$i]->getGanadas(); ?>"  readonly/>
                        </td>
                        <td>
                            <input type="text" name="perdidas" value="<?php echo $v[$i]->getPerdidas(); ?>"  readonly/>
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