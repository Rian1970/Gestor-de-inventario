<?php
class Usuario {
    private $usuarioId;
    private $matricula;
    private $nombre;
    private $ApP;
    private $ApM;
    private $cargo;
    private $contrasenia;

    //Contructor en php
    public function __construct($usuarioId, $matricula, $nombre, $ApP, $ApM, $cargo, $contrasenia) {
        $this->usuarioId = $usuarioId;
        $this->matricula = $matricula;
        $this->nombre = $nombre;
        $this->ApP = $ApP; 
        $this->ApM = $ApM; 
        $this->cargo = $cargo; 
        $this->contrasenia = $contrasenia; 
    }

    public function getUsuarioId() {
        return $this->usuarioId;
    }

    public function getMatricula() {
        return $this->matricula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApP() {
        return $this->ApP;
    }
    
    public function getApM() {
        return $this->ApM;
    }

    public function getCargo() {
        return $this->cargo;
    }

    public function getContrasenia() {
        return $this->contrasenia;
    }

    public function setUsuarioId($usuarioId) {
        $this->usuarioId = $usuarioId;
    }

    public function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApP($ApP) {
        $this->ApP = $ApP;
    }
    
    public function setApM($ApM) {
        $this->ApM = $ApM;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setContrasenia($contrasenia) {
        $this->contrasenia = $contrasenia;
    }

    //Regresa todos los atributos en una cadena
    public function __toString() {
        return "\nUsuario" .
            "\nMatricula: " . $this->matricula .
            "\nNombre: " . $this->nombre .
            "\nApP: " . $this->ApP;
            "\nApM: " . $this->ApM;
            "\nCargo: " . $this->cargo;
            "\nContrasenia: " . $this->contrasenia;
    }
}

?>