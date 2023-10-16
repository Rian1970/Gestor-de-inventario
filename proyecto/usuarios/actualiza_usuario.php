<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];

  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion";
    die();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualiza usuario</title>
</head>
<body>
    <h1>Actualiza tu información de usuario</h1>
    
    <form action="" method="post" >

        <label for="cargo">Selecciona el nuevo cargo</label><br>
        <input type="radio" id="cargo" name="cargo" value="Estudiante" required>
        <label for="estudiante">Estudiante</label><br>
        <input type="radio" id="cargo" name="cargo" value="Profesor" required>
        <label for="profesor">Profesor</label><br>
        <input type="radio" id="cargo" name="cargo" value="Laboratorista" required>
        <label for="laboratorista">Laboratorista</label><br><br>

        <input type="submit" value="Actualizar" name="Actualizar"><br><br>
        <a href=../index.php>Regresar</a>
    </form>

    <?php
    require_once('../entidades/Usuario.php'); 
    require_once('../impl/daoUsuarioImpl.php'); 

    $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");
    
    $nuevoCargo = $_POST["cargo"];

    // echo $varsesion;
    // echo $nuevoCargo;
    
    $exito = $usuarioDAO->actualizarUsuario($varsesion, $nuevoCargo);

    if($exito === True && isset($_POST["Actualizar"])){
        echo "<br><br>Se ha actualizado con éxito.<br>";
        // echo "<a href=../flujo_ventanas.php>Regresar</a>";
    }else{
        // echo "Chale";
    }
    
    
    ?>
</body>
</html>