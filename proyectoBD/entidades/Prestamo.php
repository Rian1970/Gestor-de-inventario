<?php
class Prestamo {
    private $prestamoId;
    private $usuarioId;
    private $equipoId;
    private $fechaP;
    private $nombre;

    //Contructor en php
    public function __construct($prestamoId, $usuarioId, $equipoId, $fechaP, $nombre) {
        $this->prestamoId = $prestamoId;
        $this->usuarioId = $usuarioId;
        $this->equipoId = $equipoId;
        $this->fechaP = $fechaP; 
        $this->nombre = $nombre;
    }

    public function getPrestamoId() {
        return $this->prestamoId;
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getEquipoId() {
        return $this->equipoId;
    }

    public function getFechaP() {
        return $this->fechaP;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setPrestamoId($prestamoId) {
        $this->prestamoId = $prestamoId;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setEquipoId($equipoId) {
        $this->equipoId = $equipoId;
    }

    public function setFechaP($fechaP) {
        $this->fechaP = $fechaP;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    //Regresa todos los atributos en una cadena
    public function __toString() {
        return "\nPrestamo" .
            "\nUsuario: " . $this->usuarioId .
            "\nEquipo: " . $this->equipoId .
            "\nfechaIP: " . $this->fechaP ;
    }
}

?>