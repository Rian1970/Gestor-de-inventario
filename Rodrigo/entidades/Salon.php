<?php
class Salon {
    private $salonId;
    private $numSalon;
    private $tipo;

    //Contructor en php
    public function __construct($salonId, $numSalon, $tipo) {
        $this->salonId = $salonId;
        $this->numSalon = $numSalon;
        $this->tipo = $tipo;
    }

    public function getSalonId() {
        return $this->salonId;
    }

    public function getNumSalon() {
        return $this->numSalon;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setSalonId($salonId) {
        $this->salonId = $salonId;
    }

    public function setNumSalon($numSalon) {
        $this->numSalon = $numSalon;
    }

    public function setTipó($tipo) {
        $this->tipo = $tipo;
    }

    //Regresa todos los atributos en una cadena
    public function __toString() {
        return "\nSalon" .
            "\nNumero Salon: " . $this->numSalon .
            "\nTipo: " . $this->tipo;
    }
}

?>