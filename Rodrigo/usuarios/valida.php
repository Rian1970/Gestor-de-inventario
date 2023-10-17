<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Iniciar sesión</title>
</head>
<body>
<?php
// Conexión a la base de datos
// $conexion = new PDO("mysql:host=localhost;dbname=InventarioLab", "root", "");
require_once('../entidades/Usuario.php'); 
require_once('../impl/daoUsuarioImpl.php'); 

// Obtención de los datos del formulario
$matricula = $_POST["matricula"];
$contrasena =  $_POST["contrasenia"];

$usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");
$consulta = $usuarioDAO->getTodosUsuarios($matricula);
// Consulta para obtener el hash de contraseña almacenado por correo
// $consulta = $conexion->prepare("SELECT matricula, contrasena FROM usuario WHERE matricula = :matricula");
// $consulta->bindParam(":matricula", $matricula);
// $consulta->execute();
foreach($consulta as $consulta){
    $n = $consulta->getNombre();
    $usuarioId = $consulta->getUsuarioId();
    $contrasena_hash = $consulta->getContrasenia();
    //echo $n;
}

// Si el usuario existe
if (isset($usuarioId)) {
    // Obtener los datos del usuario
    // Verificar la contraseña proporcionada con el hash almacenado
    if (password_verify($contrasena, $contrasena_hash)) {
        // Contraseña válida, iniciar sesión
        session_start();
        $_SESSION["id_usuario"] = $usuarioId;
        $usuario = $_SESSION["id_usuario"];
        $estado = false;
        if(isset($usuario)){
            $estado = true;
            // Redirección a la página principal
            header("Location: ../flujo_ventanas.php");
        }
    } else {
        // Contraseña incorrecta
        echo "El usuario o la contraseña no son correctos.<br>";
        echo "<a href=../index.php>Regresar</a>";
        exit();
    }
} else {
    // El usuario no existe
    echo "El usuario o la contraseña no son correctos.<br>";
    echo "<a href=../index.php>Regresar</a>";
    exit();
}
?>

</body>
</html>
