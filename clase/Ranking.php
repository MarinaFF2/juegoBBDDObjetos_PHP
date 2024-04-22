<?php
/**
 * Description of Ranking
 *
 * @author daw207
 */
class Ranking {
    /**
     * Variables
     */
    private $idRanking;
    private $ganadas;
    private $perdidas;
    private $usuario;
    
    /**
     * Constructor de Ranking
     * @param type $idRanking
     * @param type $ganadas
     * @param type $perdidas
     * @param type $usuario
     */
    function __construct($idRanking, $ganadas, $perdidas, $usuario) {
        $this->idRanking = $idRanking;
        $this->ganadas = $ganadas;
        $this->perdidas = $perdidas;
        $this->usuario = $usuario;
    }

    
    /**
     * Get de partidas ganadas
     * @return type
     */
    function getGanadas() {
        return $this->ganadas;
    }

    /**
     * Get de partidas perdidas
     * @return type
     */
    function getPerdidas() {
        return $this->perdidas;
    }

    /**
     * Get de usuario
     * @return type
     */
    function getUsuario() {
        return $this->usuario;
    }

    /**
     * Set de partidas ganadas
     * @param type $ganadas
     */
    function setGanadas($ganadas) {
        $this->ganadas = $ganadas;
    }

    /**
     * Set de partidas perdidas
     * @param type $perdidas
     */
    function setPerdidas($perdidas) {
        $this->perdidas = $perdidas;
    }

    /**
     * Set de Usuario
     * @param type $usuario
     */
    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

        
    /**
     * Set de idRanking
     * @param type $idRanking
     */
    function setIdRanking($idRanking) {
        $this->idRankin = $idRanking;
    }
    
    /**
     * Get de IdRanking
     * @return type
     */
    function getIdRanking() {
        return $this->idRanking;
    }
}