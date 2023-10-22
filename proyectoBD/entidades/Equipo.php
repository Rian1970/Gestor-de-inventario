<?php
class Equipo {
    private $equipoId;
    private $serie;
    private $nombre;
    private $categoria;
    private $estadoE;
    private $fechaCompra;
    private $salon;

    //Contructor en php
    public function __construct($equipoId, $estadoE, $categoria, $salon, $serie, $nombre, $fechaCompra) {
        $this->equipoId = $equipoId;
        $this->serie = $serie;
        $this->nombre = $nombre;
        $this->categoria = $categoria; 
        $this->estadoE = $estadoE; 
        $this->fechaCompra = $fechaCompra; 
        $this->salon = $salon; 
    }

    public function getSerie() {
        return $this->serie;
    }

    public function getEquipoId() {
        return $this->equipoId;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCategoria() {
        return $this->categoria;
    }
    
    public function getEstadoE() {
        return $this->estadoE;
    }

    public function getFechaC() {
        return $this->fechaCompra;
    }

    public function getSalon() {
        return $this->salon;
    }

    public function setEquipoId($equipoId) {
        $this->equipoId = $equipoId;
    }

    public function setSerie($serie) {
        $this->serie = $serie;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }
    
    public function setEstadoE($estadoE) {
        $this->estadoE = $estadoE;
    }

    public function setFechaC($fechaCompra) {
        $this->fechaCompra = $fechaCompra;
    }

    public function setSalon($salon) {
        $this->salon = $salon;
    }

    //Regresa todos los atributos en una cadena
    public function __toString() {
        return "\nEquipo" .
            "\nSerie: " . $this->serie .
            "\nNombre: " . $this->nombre .
            "\nCategoria: " . $this->categoria;
            "\nEstado: " . $this->estadoE;
            "\nFecha de compra: " . $this->fechaC;
            "\nSalon: " . $this->salon;
    }
}

?>