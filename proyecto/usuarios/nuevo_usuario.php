<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar usuario</title>
</head>
<body>
    
    <?php

    require_once('../entidades/Usuario.php'); 
    require_once('../impl/daoUsuarioImpl.php'); 

    $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");

    // Obtener los valores introducidos por el usuario
    $id = 0;
    $nombre = $_POST["nombre"];
    $matricula = $_POST["matricula"];
    $aPat = $_POST["aPat"];
    $aMat = $_POST["aMat"];
    $cargo = $_POST["cargo"];
    $contrasena = $_POST["contrasenia"];
    $contrasena2 = $_POST["contrasenia2"];
  
    // Comprobación de que los datos son correctos
    if ($contrasena != $contrasena2) {
      echo "Las contraseñas no coinciden<br>";
      echo "<a href=nuevo_usuario.html>Regresar</a>";
      exit();
    }
  
    $usuario = new usuario($id, $matricula, $nombre, $aPat, $aMat, $cargo, $contrasena);

    $usuarioDAO->guardarUsuario($usuario);

    echo "El usuario ha sido creado.<br>";
    echo "<a href=../index.php>Regresar</a>";
    ?>
</body>
</html>