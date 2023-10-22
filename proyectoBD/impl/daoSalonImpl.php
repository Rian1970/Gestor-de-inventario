<?php
require_once('../DAO/daoSalon.php');
require_once("../entidades/Salon.php");
require_once("../entidades/Gestion.php");

class daoSalonImpl implements daoSalon {
    private $conexion;
    private $id; 

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosSalones() {
        $salones = array();

        // Realizar una consulta para obtener todos los salones de la base de datos
        $query = "SELECT gestion.Gestion_id, usuario.Nombre, salon.Num_salon, salon.Tipo_Salon from usuario join gestion on usuario.Usuario_id=gestion.Usuario_id join salon on salon.Salon_id=gestion.Salon_id;";
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $salones[] = new gestion(
                    $row['Gestion_id'], 
                    $row['Nombre'], 
                    $row['Num_salon'],
                    $row['Tipo_Salon']);
            }
            $result->free();
        }

        return $salones;
    }

    public function guardarSalon(Salon $s) {
        // Insertar un nuevo libro en la base de datos
        $query = "INSERT INTO salon (Num_Salon, Tipo_Salon) VALUES (?, ?)";
        $stmt = $this->conexion->prepare($query);

        $numSalon = $s->getNumSalon();
        $tipoSalon = $s->getTipo();
        $stmt->bind_param("ss", $numSalon, $tipoSalon);
        
        $s = 0;
        try {
            $stmt->execute();
        } catch (mysqli_sql_exception $e) {
              echo "<div class='alert alert-danger'>El salon ya existe.</div>";
              echo "<br><a href=../salon/nuevo_salon.php>Regresar</a>";
              $s = 1;
        }

        if($s == 0){
            echo "El salon ha sido creado.<br>";
            echo "<br><a href=../salon/nuevo_salon.php>Regresar</a>";
        }
    }

    public function borrarSalon($borra) {
        // Eliminar un libro de la base de datos por ISBN
        $query = "DELETE from gestion where Salon_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $borra);
        $stmt->execute();
    }

    public function getGestion($g) {
 
        $salones = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT gestion.Gestion_id, usuario.Nombre, salon.Num_salon, salon.Tipo_Salon from usuario join gestion on usuario.Usuario_id=gestion.Usuario_id join salon on salon.Salon_id=gestion.Salon_id where gestion.Gestion_id = $g";

        // $stmt = $this->conexion->prepare($query);
        // $stmt->bind_param("s", $g);
        // $stmt->execute();
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $salones[] = new gestion(
                    $row['Gestion_id'], 
                    $row['Nombre'], 
                    $row['Num_salon'],
                    $row['Tipo_Salon']);
            }
            $result->free();
        }

        return $salones;
    }

    public function getSalones() {
        $salones = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT * from salon";
        $result = $this->conexion->query($query);

        if ($result) {

            while ($row = $result->fetch_assoc()) {
                $salones[] = new salon(
                    $row['Salon_id'], 
                    $row['Num_Salon'],
                    $row['Tipo_Salon']);
            }
            $result->free();
        }

        return $salones;
    }

    public function actualizaSalon($nuevoSalon, $id){
        
        $query = "INSERT INTO gestion (Usuario_id, Salon_id) values (?, ?)";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $id, $nuevoSalon);
        $stmt->execute();

    }
}

?>
