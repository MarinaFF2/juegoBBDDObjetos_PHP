<?php

require_once 'Conexion.php';

/**
 * Description of Email
 *
 * @author daw207
 */
class Email {

    static function enviarCorreo($para) {
        $pwd = generateRandomString(5);
        $pwdBD = md5($pwd);
        //cifro la contraseña generada
        Conexion::ModificarUsuContra($para, $pwdBD);
//        $de = "auxiliardaw2@gmail.com";
//        $clave = "Chubaca20";
        $mensaje = "La nueva contraseña para entrar del usuario " . $para . " es: '" . $pwd . "'.";
        $asunto = "Se ha olvidado la contraseña ";
        mail($para, $asunto, $mensaje);
        header('Location: ../index.php');
    }

    /**
     * Genera la contraseña
     * @param type $length
     * @return type
     */
    static function generateRandomString($length) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }
}
