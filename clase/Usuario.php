<?php
/**
 * Description of Usuario
 *
 * @author daw207
 */
class Usuario {
    /**
     * Variables
     */
    private $correo;
    private $clave;
    private $nombre;
    private $apellido;
    private $rol;
    
    /**
     * Constructor de Usuario
     * @param type $correo
     * @param type $clave
     * @param type $nombre
     * @param type $apellido
     * @param type $rol
     */
    function __construct($correo, $clave, $nombre, $apellido, $rol ){
        $this->correo = $correo;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->rol = $rol;
    }

    /**
     * Get de correo/usuario
     * @return type
     */
    function getCorreo() {
        return $this->correo;
    }

    /**
     * Get de clave
     * @return type
     */
    function getClave() {
        return $this->clave;
    }

    /**
     * Get de nombre
     * @return type
     */
    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    /**
     * Get de rol
     * @return type
     */
    function getRol() {
        return $this->rol;
    }

    
    /**
     * Set de correo/usuario
     * @param type $correo
     */
    function setCorreo($correo) {
        $this->correo = $correo;
    }

    /**
     * Set de clave
     * @param type $clave
     */
    function setClave($clave) {
        $this->clave = $clave;
    }

    /**
     * set de nombre
     * @param type $nombre
     */
    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    /**
     * Set de apellido
     * @param type $apellido
     */
    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    /**
     * Set de Rol
     * @param type $rol
     */
    function setRol($rol) {
        $this->rol = $rol;
    }

    /**
     * Metodo toString
     * @return type
     */        
    public function toString() {
        return "Usuario{"."correo=".$correo.", clave=".$clave.", nombre=".$nombre.", apellido=".$apellido.", rol=".$rol.".}";
    }
}