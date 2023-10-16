<?php

require_once('daoUsuario.php');
//require_once("usuario.php");

//class daoUsuarioImpl implements dao {
class daoUsuarioImpl {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }/* else {
            echo "Conexión exitosa!";
        }*/
    }
    public function getUsuarios(){
        //$mysqli = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }else{
            // Se obtienen todos los usuarios
            $query = "SELECT * FROM usuario";

            if ($result = $this->conexion->query($query)) {
                echo "<table border='1'>";
                echo "<tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cargo</th>
                    </tr>";

                while ($row = $result->fetch_assoc()) {
                    $field1name = $row["Usuario_id"];
                    $field2name = $row["Tipo_Cargo"];
                    $field3name = $row["Matricula"];
                    $field4name = $row["Nombre"];
                    $field5name = $row["ApellidoP"];
                    $field6name = $row["ApellidoM"];
                    $field7name = $row["Contrasenia"];

                    echo '<tr>
                            <td>'.$field4name.'</td> 
                            <td>'.$field5name.'</td> 
                            <td>'.$field2name.'</td> 
                        </tr>';
                    
                }
                echo "</table>";
                /*freeresultset*/
                $result->free();
            }
        }
    }

    public function addUsuario($cargo, $matricula, $nombre, $ap1, $ap2, $pass) {
        $query = "INSERT INTO usuario (Tipo_Cargo, Matricula, Nombre, ApellidoP, ApellidoM, Contrasenia) VALUES ('$cargo', '$matricula', '$nombre', '$ap1', '$ap2', '$pass')";
        if (mysqli_query($this->conexion, $query)) {
            echo "Se agregó el usuario!";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($this->conexion);
        }

    }
}

$prueba = new daoUsuarioImpl("localhost", "root", "", "inventariolab");

// Se obtienen los datos del form
$nombre = $_GET["nombre"];
$aPat = $_GET["aPat"];
$aMat = $_GET["aMat"];
$cargo = $_GET["cargo"];
$Departamento = $_GET["Departamento"];
$matricula = $_GET["matricula"];
$pass = $_GET["pass"];


$prueba->addUsuario(
    $_GET["cargo"],
    $_GET["matricula"],
    $_GET["nombre"],
    $_GET["aPat"],
    $_GET["aMat"],
    $_GET["pass"]
);

header("Location: nuevo_usuario.php");
die();

?>