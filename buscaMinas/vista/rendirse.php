<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Busca Minas</title> 
        <style>
            .h{
                text-align: center;
                width: 30px;
            }
        </style>
    </head>
    <body> 
        <?php
        require_once '../clase/Tablero.php';
        require_once '../../clase/Conexion.php';
        session_start();
        if (isset($_SESSION['cor'])) {
            $cor = $_SESSION['cor'];
        }
        Conexion::partidaPerdida($cor);
        $v = $_SESSION['tablero'];
        $t = $_SESSION['t'];
        $m = $_SESSION['m'];
        $ta = new Tablero($t,$m);
        ?>
        <form name="tablero" action="../controlador/jugada.php" method="POST">   
            <?php
            echo 'te has rendido.<br>';
            for ($i = 0; $i < count($v); $i++) {
                if ($v[$i] == 99) {
                    ?>
                    <input type="submit" class="h" name="h" value="<?php echo '*'; ?>" disabled="true"> 
                    <?php
                } else {
                    ?>
                    <input type="submit" class="h" name="h" value="<?php echo $v[$i]; ?>" disabled="true">
                    <?php
                }
            }
            ?>
                <br>
            <input type="submit" name="volver" value="Volver">
        </form> 
    </body>
</html>