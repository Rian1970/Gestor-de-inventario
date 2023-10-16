<?php
require_once('../DAO/daoUsuario.php');
require_once("../entidades/Usuario.php");

class daoUsuarioImpl implements daoUsuario {
    private $conexion;

    public function __construct($host, $usuario, $contrasena, $base_de_datos) {
        // Conectar a la base de datos MySQL
        $this->conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
    }

    public function getTodosUsuarios($m) {
        $usuarios = array();

        // Realizar una consulta para obtener todos los libros de la base de datos
        $query = "SELECT * FROM usuario WHERE Matricula = $m";
        $result = $this->conexion->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $usuarios[] = new Usuario($row['Usuario_id'], $row['Matricula'], $row['Nombre'], $row['ApellidoP'], $row['ApellidoM'], $row['Tipo_Cargo'], $row['Contrasenia']);
            }
            $result->free();
        }

        return $usuarios;
    }

    public function guardarUsuario(Usuario $u) {
        // Insertar un nuevo libro en la base de datos
        $query = "INSERT INTO usuario (Tipo_Cargo, Matricula, Nombre, ApellidoP, ApellidoM, Contrasenia) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexion->prepare($query);

        $cargo = $u->getCargo();
        $matricula = $u->getMatricula();
        $nombre = $u->getNombre();
        $apP = $u->getApP();
        $apM = $u->getApM();
        $contrasenia = $u->getContrasenia();
        $contraseniaHash = password_hash($contrasenia, PASSWORD_DEFAULT);

        $stmt->bind_param("ssssss", $cargo, $matricula, $nombre, $apP, $apM, $contraseniaHash);
        $stmt->execute();
    }

    public function actualizarUsuario($id, $c){
        $query = "UPDATE usuario set Tipo_Cargo = ? where Usuario_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("ss", $c, $id);
        if ($stmt->execute()) {
            return true; // La actualización fue exitosa
        } else {
            return false; // Error en la actualización
        }
    }

    public function borrarUsuario($id) {
        // Eliminar un libro de la base de datos por ISBN
        $query = "DELETE from usuario where Usuario_id = ?";
        $stmt = $this->conexion->prepare($query);
        $stmt->bind_param("s", $id);
        $stmt->execute();
    }
}
?>
