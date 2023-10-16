<?php
require_once('daoEquipo.php');
require_once("Equipo.php");

class daoEquipoImpl implements daoEquipo {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosEquipos() {
        $equipos = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT * FROM equipo";
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $equipos[] = new Equipo(
                    $row['Estado_Equipo'], 
                    $row['Categoria'], 
                    $row['Salon_id'], 
                    $row['No_Serie'], 
                    $row['Nombre'], 
                    $row['FechaDeCompra']);
            }
            $result->free();
        }

        return $equipos;
    }
}

?>
