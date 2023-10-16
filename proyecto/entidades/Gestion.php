<?php
class Gestion {
    private $gestionId;
    private $nombre;
    private $numSalon;
    private $tipoSalon;

    //Contructor en php
    public function __construct($gestionId ,$nombre, $numSalon, $tipoSalon) {
        $this->gestionId = $gestionId;
        $this->nombre = $nombre;
        $this->numSalon = $numSalon;
        $this->tipoSalon = $tipoSalon;
    }

    public function getGestionId() {
        return $this->gestionId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNumSalon() {
        return $this->numSalon;
    }

    public function getTipoSalon() {
        return $this->tipoSalon;
    }

    public function setGestionId($gestionId) {
        $this->gestionId = $gestionId;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setNumSalon($numSalon) {
        $this->numSalon = $numSalon;
    }

    public function setTipoSalon($tipoSalon) {
        $this->tipoSalon = $tipoSalon;
    }

    //Regresa todos los atributos en una cadena
    public function __toString() {
        return "\nGestion" .
            "\nUsuario: " . $this->nombre .
            "\nSalon: " . $this->numSalon;
    }
}

?>