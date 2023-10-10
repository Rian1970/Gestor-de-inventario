<?php
require_once('daoUsuario.php');
require_once("usuario.php");

class daoUsuarioImpl implements dao {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosLibros() {
        $libros = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT * FROM libros";
        $result = $this->conexion->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $libros[] = new Libro($row['titulo'], $row['autor'], $row['isbn'], $row['genero']);
            }
            $result->free();
        }

        return $libros;
    }


?>
