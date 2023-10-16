<?php
require_once('../DAO/daoMantenimiento.php');
require_once("../entidades/Mantenimiento.php");

class daoMantenimientoImpl implements daoMantenimiento {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosMantenimientos() {
        $equipos = array();
        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT * FROM registro_mantenimiento (?, ?, ?, ?, ?, ?)";
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $equipos[] = new Mantenimiento(
                    $row['Equipo_id'], 
                    $row['Tipo_Mantenimiento'], 
                    $row['Estado_Mantenimiento'], 
                    $row['Fecha_Inicio_M'], 
                    $row['Fecha_Fin_M'],  
                    $row['Costo']);
            }
            $result->free();
        }

        return $equipos;
    }

    // public function guardarMantenimiento(Mantenimiento $m) {
    //     // Insertar un nuevo libro en la base de datos
    //     $query = "INSERT INTO equipo (Estado_Equipo, Categoria, Salon_id, No_Serie, Nombre, FechaDeCompra) VALUES (?, ?, ?, ?, ?, ?)";
    //     $stmt = $this->conexion->prepare($query);

    //     $estado = "Disponible";
    //     $caterogria = $e->getCategoria();
    //     $salon = 1;
    //     $serie = $e->getSerie();
    //     $nombre = $e->getNombre();
    //     $fecha = $e->getFechaC();

    //     $stmt->bind_param("ssssss", $estado, $caterogria, $salon, $serie, $nombre, $fecha);
    //     $stmt->execute();
    // }

    // public function borrarEquipo($e) {
    //     // Eliminar un libro de la base de datos por ISBN
    //     $query = "DELETE from equipo where Equipo_id = ?";
    //     $stmt = $this->conexion->prepare($query);
    //     $stmt->bind_param("s", $e);
    //     $stmt->execute();
    // }

}

?>
