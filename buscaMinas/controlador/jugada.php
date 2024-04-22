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
        session_start();
        if (isset($_SESSION['tablero'])) {
            $t = $_SESSION['t'];
            $m = $_SESSION['m'];
            $ta = new Tablero($t, $m);
            $ve = $_SESSION['tablero'];
            $vis = $_SESSION['vista'];
        }
        //cuando vienes del index
        if (isset($_REQUEST['jugar'])) {
            $t = $_REQUEST['t'];
            $m = $_REQUEST['m'];
            $ta = new Tablero($t, $m);
            $s = $ta->comprobarTM();
            if ($s) {
                $vis = $ta->iniciarTableroVista(); //vector que se va a ver
                $ve = $ta->iniciarTablero(); //vector donde esta la solucion
                $_SESSION['t'] = $t;
                $_SESSION['m'] = $m;
                $_SESSION['tablero'] = $ve;
                $_SESSION['vista'] = $vis;
                $_SESSION['cont'] = 0;
                $ta->mostrarTablero($vis);
                print_r($ve);
            }
        }
        if ($_REQUEST['volveraJugada'] == 'Volver') {
            header("Location: ../../vista/juego.php");
        }
        if ($_REQUEST['volver'] == 'Volver') {
            header("Location: ../index.php");
        }
        if ($_REQUEST['rendirse'] == 'Rendirse') {
            $ve = $_SESSION['tablero'];
            $vis = $_SESSION['vista'];
            header("Location: ../vista/rendirse.php");
        }
        if (isset($_REQUEST['boton'])) {
            $pos = $_REQUEST['boton'];
            $ta->comprobarTablero($ve, $vis, $pos);
            $_SESSION['vista'] = $vis;
            $ta->mostrarPistas($vis);
            $ta->mostrarTablero($vis);
        }
        ?>
    </body>
</html>