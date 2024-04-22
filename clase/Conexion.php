<?php

require_once 'Ranking.php';
require_once 'Constantes.php';
require_once 'Usuario.php';

/**
 * Description of Constantes
 *
 * @author Marina Flores Fernandez
 */
class Conexion {

    private static $conexion;

    static function abrirBD() {
        /* Abrir la conexión */
        try{
        self::$conexion = new mysqli('localhost', Constantes::$usuario, Constantes::$password, Constantes::$BBDD);
        } catch (Exception $e){
            echo 'Error de conexion';
        }
    }

    static function cerrarBD() {
        /* Cerrar la conexión */
        self::$conexion->close();
    }

    /**
     * CLASE USUARIOS
     */

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * con el correo y contraseña para el incio de sesion
     * @return \Usuario
     */
    static function existeUsuario($correo, $pwd) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where usuario.correo=? and usuario.pwd=? and asignarRol.usuario=usuario.correo');
        $stmt->bind_param('ss', $correo, $pwd);
        $stmt->execute();
        $u = null;
        $result = $stmt->get_result();
      
            if ($fila = $result->fetch_assoc()) {
                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
            }
        
        $stmt->close();
        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener un usuario para comprobar que exite
     * solo con el correo
     * @return \Usuario
     */
    static function existeUsu($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where usuario.correo=? and asignarRol.usuario=usuario.correo');
        $stmt->bind_param('s', $correo);
        $stmt->execute();
        $u = "";
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
                $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $u;
    }

    /**
     * Metodo para obtener una lista de array con la clase usuario
     * @return \Usuario
     */
    static function obtenerUsuarios() {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT usuario.correo, usuario.pwd, usuario.nombre, usuario.apellido, asignarRol.idRol FROM usuario,asignarRol where asignarRol.usuario=usuario.correo');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
               $u = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
            $v[] = $u;
            }
        }       
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * METODO INSERTAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function insertarUsuarios($correo, $pwd, $nombre, $apellido) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('INSERT INTO usuario (correo, pwd, nombre, apellido) VALUES (?,?,?,?)');
        $stmt->bind_param("ssss", $correo, $pwd, $nombre, $apellido);
        // set parameters and execute
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function ModificarUsuarios($correo, $nombre, $apellido) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE usuario SET nombre=?, apellido=? where correo=?');
        $stmt->bind_param("sss", $nombre, $apellido, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR USUARIO
     * @param type $correo
     * @param type $pwd
     * @param type $nombre
     * @param type $apellido
     */
    static function ModificarUsuContra($correo, $pwd) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE usuario SET pwd=? where correo=?');
        $stmt->bind_param("ss", $pwd, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR USUARIO   
     * @param type $correo
     */
    static function borrarUsuario($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM usuario WHERE correo=?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * CLASE ROL
     */

    /**
     * METODO INSERTAR ROL
     * @param type $correo
     * @param type $rol
     */
    static function insertarRol($correo, $rol) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('INSERT INTO asignarRol (idAsignarRol, usuario, idRol) VALUES (0,?,?)');
        $stmt->bind_param("si", $correo, $rol);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * Metodo modificar rol
     * @param type $idAsignarRol
     * @param type $rol
     * @param type $correo
     */
    static function ModificarRol($rol, $correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE asignarRol SET idRol=? WHERE usuario=?');
        $stmt->bind_param("is", $rol, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR ROL
     * @param type $correo
     */
    static function borrarRol($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM asignarRol WHERE usuario = ?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * CLASE RANKING
     */

    /**
     * METODO INSERTAR CALIFICACIONES
     * @param type $correo
     * @param type $ganadas
     * @param type $perdidas
     */
    static function insertarRanking($correo, $ganadas, $perdidas) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('INSERT INTO ranking (idRanking,ganadas,perdidas,usuario) VALUES (0,?,?,?)');
        $stmt->bind_param("iis", $ganadas, $perdidas, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * Metodo para obtener una lista de array con la clase ranking
     * @return \Ranking
     */
    static function obtenerRanking() {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT * FROM ranking ORDER BY ganadas desc, perdidas desc');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
               $r = new Ranking($fila[0], $fila[1], $fila[2], $fila[3]);
                $v[] = $r;
            }
        }        
        $stmt->close();
        self::cerrarBD();
        return $v;
    }

    /**
     * Metodo para obtener un ranking de la clase ranking
     * @return \Ranking
     */
    static function obtenerRankingUsu($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('SELECT * FROM ranking WHERE usuario=?');
        $stmt->bind_param($stmt, 's', $correo);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            while ($fila = $result->fetch_assoc()) {
               $r = new Ranking($fila[0], $fila[1], $fila[2], $fila[3]);
            }
        }
        $stmt->close();
        self::cerrarBD();
        return $r;
    }

    /**
     * METODO partida perdida
     * @param type $correo
     */
    static function partidaPerdida($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE ranking SET perdidas=perdidas+1 WHERE usuario=?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO Añadir partida ganada
     * @param type $correo
     */
    static function partidaGanada($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE ranking SET ganadas=ganadas+1 WHERE usuario=?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * METODO MODIFICAR CALIFICACIONES
     * @param type $correo
     * @param type $ganadas
     * @param type $perdidas
     */
    static function ModificarRanking($correo, $ganadas, $perdidas) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('UPDATE ranking SET ganadas=?,perdidas=? WHERE correo=?');
        $stmt->bind_param("iis", $ganadas, $perdidas, $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }

    /**
     * BORRAR RANKING  
     * @param type $correo
     */
    static function borrarRanking($correo) {
        self::abrirBD();
        $stmt = self::$conexion->prepare('DELETE FROM ranking WHERE usuario = ?');
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $stmt->close();
        self::cerrarBD();
    }
}
