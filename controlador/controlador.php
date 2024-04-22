<?php

require_once '../clase/Ranking.php';
require_once '../clase/Conexion.php';
require_once '../clase/Usuario.php';
require_once '../clase/Email.php';

session_start();
//para recoger las sesiones inicializadas
if (isset($_SESSION['usu'])) {
    $usu = $_SESSION['usu'];
    $cor = $_SESSION['cor'];
}

/**
 * Ventana registrarse
 */
if (isset($_REQUEST['registrar'])) {
    $correo = $_REQUEST['correo'];
    $pass = $_REQUEST['clave'];
    $repass = $_REQUEST['reclave'];
    if ($pass == $repass) {
        $passHash = md5($pass); //si esta bien codificada devuelve true
        $u = Conexion::existeUsu($correo);
        if ($u == null) { //solo funciona si es diferente de null, porque no detecta que esta vacio
            $nom = $_REQUEST['nombre'];
            $ape = $_REQUEST['apellido'];
            Conexion::insertarUsuarios($correo, $passHash, $nom, $ape);
//            Conexion::insertarUsuarios($correo, $pass, $nom, $ape);
            Conexion::insertarRol($correo, 0);
            Conexion::insertarRanking($correo, 0, 0);
            header('Location: ../index.php');
        }
    } else {
        header('Location: ../vista/registrarse.php');
    }
}
if (isset($_REQUEST['volver'])) {
    header("Location: ../index.php");
}
/**
 * Ventana inicar sesion / index
 */
if (isset($_REQUEST['aceptarIndex'])) {
    $correo = $_REQUEST['usuario'];
    $pass = $_REQUEST['pwd'];
    $passHash = md5($pass);
    $u = Conexion::existeUsuario($correo, $passHash);
//    $u = Conexion::existeUsuario($correo, $pass);
    if ($u != null) {
        $_SESSION['usu'] = $u;
        $_SESSION['cor'] = $u->getCorreo();
        if ($u->getRol() == 0) { //si eres jugador
            header('Location: ../vista/juego.php');
        }
        if ($u->getRol() == 1) { //si eres administrador
            header('Location: ../vista/menu.php');
        }
    } else {
        header('Location: ../index.php');
    }
}

//estas en el crud de usuario (siendo admin)
if (isset($_REQUEST['botUsuario'])) {

    //cuando editas a un usuario
    if ($_REQUEST['botUsuario'] == 'Editar') {
        $correo = $_REQUEST['correo'];
        $nombre = $_REQUEST['nombre'];
        $apellido = $_REQUEST['apellido'];
        $rol = $_REQUEST['rol'];
        Conexion::ModificarUsuarios($correo, $nombre, $apellido);
        Conexion::ModificarRol($rol, $correo);
        header('Location: ../vista/crudUsuario.php');
    }

    //Cuando eliminas a un usuario
    if ($_REQUEST['botUsuario'] == 'X') {
        $correo = $_REQUEST['correo'];
        Conexion::borrarUsuario($correo);
        Conexion::borrarRol($correo);
        Conexion::borrarRanking($correo);
        header('Location: ../vista/crudUsuario.php');
    }
}
//crud usuario redirecionar
if (isset($_REQUEST['crudUsu'])) {
    header('Location: ../vista/crudUsuario.php');
}

//menu de jugador
if (isset($_REQUEST['jugarA'])) {
    header('Location: ../vista/juego.php');
}
//cuando le das a jugar
if (isset($_REQUEST['jugar'])) {
    header('Location: ../buscaMinas/index.php');
}

//para ver como estas en la clasificatoria
if (isset($_REQUEST['ranking'])) {
    header('Location: ../vista/clasificacion.php');
}

//cuando has olvidado la contraseña
if (isset($_REQUEST['botOlvidoPwd'])) {
    $para = $_REQUEST['email'];
    Email::enviarCorreo($para);
}