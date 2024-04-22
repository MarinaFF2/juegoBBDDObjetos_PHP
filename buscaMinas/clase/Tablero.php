<?php
session_start();
/**
 * Description of tablero
 * @author ff_ma
 */
class tablero {

    private $t;
    private $m;

    function __construct($t, $m) {
        $this->t = $t;
        $this->m = $m;
    }

    function getT() {
        return $this->t;
    }

    function getM() {
        return $this->m;
    }

    function setT($t) {
        $this->t = $t;
    }

    function setM($m) {
        $this->m = $m;
    }

    function iniciarTableroVista() { //tablero que se muestra
        for ($i = 0; $i < $this->t; $i++) {
            $v[$i] = '-';
        }
        return $v;
    }

    function iniciarTablero() { //tablero solucion
        for ($i = 0; $i < $this->t; $i++) {
            $v[$i] = 0;
        }
        $ta = new Tablero($this->t, $this->m);
        $ta->ponerMinas($v);
        $ta->ponerNumeros($v);

        return $v;
    }

    function ponerMinas(&$v) {
        while ($this->m > 0) {
            $pos = rand(0, count($v) - 1);
            if ($v[$pos] == 0) {
                $v[$pos] = 99; //poniendo la bomba
                $this->m = $this->m - 1;
            }
        }
    }

    function ponerNumeros(&$v) {
        for ($i = 0; $i < count($v); $i++) {
            if ($v[$i] == 99) { //para comprobar si delante de la posicion hay mina
                if ($i - 1 >= 0) {
                    if ($v[$i - 1] != 99) {
                        $v[$i - 1] ++;
                    }
                }
                if ($i + 1 < count($v)) {
                    if ($v[$i + 1] != 99) {
                        $v[$i + 1] ++;
                    }
                }
            }
        }
    }

    function comprobarTM() { //comprobamos que el tamaño y las minas son correctas
        $s = false;
        if ($this->t > 0 && $this->m > 0 && $this->t > $this->m) {
            $s = true;
        } else {
            header("Location: ../index.php");
        }
        return $s;
    }

    function mostrarPistas($v) {
        ?>
        <form name="tablero" action="../controlador/jugada.php" method="POST">     
            <?php
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
        </form>
        <?php
    }

    function mostrarTablero($v) {
        ?>
        <form name="tablero" action="../controlador/jugada.php" method="POST"> 
            <?php
            for ($i = 0; $i < count($v); $i++) {
                ?>

                <input type="submit" class="h" name='boton' value="<?php echo $i; ?>"> 
                <?php
            }
            ?>
            <br>
            <input type="submit" name="volver" value="Volver">
            <input type="submit" name="rendirse" value="Rendirse"> 
        </form> 
        <?php
    }

    function comprobarTablero($ve, &$vis, $pos) {
        $cont = $_SESSION['cont'];
        for ($i = 0; $i < count($ve); $i++) {
            if ($pos == $i) {
                $ta = new Tablero($this->t, $this->m);
                $s = $ta->signo($ve, $pos);
                if ($ve[$pos] != 99) {
                    $vis[$pos] = $s;
                    $_SESSION['vista'] = $vis;
                    $cont++;
                } else {
                    $vis[$pos] = $s;
                    $_SESSION['vista'] = $vis;
                    header("Location: ../vista/perdido.php");
                }
            }
        }
        $c = count($vis) - $this->m;
        if ($c == $cont) {
            header("Location: ../vista/ganado.php");
        }
        $_SESSION['cont'] = $cont;
    }

    function signo($ve, $pos) {
        switch ($ve[$pos]) {
            case 0:
                $s = 0;
                break;
            case 1:
                $s = 1;
                break;
            case 2:
                $s = 2;
                break;
            case 99:
                $s = '*';
                break;
        }
        return $s;
    }
}
