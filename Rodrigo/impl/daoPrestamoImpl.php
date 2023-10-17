<?php
require_once('../DAO/daoPrestamo.php');
require_once("../entidades/Prestamo.php");

class daoPrestamoImpl implements daoPrestamo {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosPrestamos($id) {
        $prestamo = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT prestamo.Prestamo_id, usuario.Nombre, equipo.Nombre, prestamo.Fecha_P, usuario.Usuario_id from usuario join prestamo on usuario.Usuario_id=prestamo.Usuario_id join equipo on equipo.Equipo_id=prestamo.Equipo_id where prestamo.Usuario_id = $id";
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $prestamo[] = new Prestamo(
                    $row['Prestamo_id'], 
                    $row['Nombre'], 
                    $row['Nombre'], 
                    $row['Fecha_P'],
                    $row['Usuario_id']);
            }
            $result->free();
        }

        return $prestamo;
    }

    public function guardarPrestamo($usuario, $equipo, $fecha) {
        // Insertar un nuevo libro en la base de datos
        $query = "INSERT INTO prestamo (Usuario_id, Equipo_id, Fecha_P) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("sss", $usuario, $equipo, $fecha);
        $stmt->execute();

        $estado = "Prestado";

        $query = "UPDATE equipo set Estado_Equipo = ? where Equipo_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $estado, $equipo);
        $stmt->execute();

    }

    public function borrarPrestamo($id) {
        $estado = "Disponible";

        $query = "UPDATE equipo set Estado_Equipo = ? where Equipo_id = (SELECT Equipo_id FROM prestamo where Prestamo_id = ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $estado, $id);
        $stmt->execute();

        $query = "DELETE from prestamo where Prestamo_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }

}