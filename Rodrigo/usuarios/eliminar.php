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
    <title>Borrar usuario</title>
</head>
<body>
    <h1>Solo puedes eliminar tu cuenta</h1>
    
    <form action="vetado.php" method="post">

        <label for="cargo">¿Seguro que quieres eliminar la cuenta?</label><br>
        <input type="radio" id="cargo" name="cargo" value="True" required>
        <label for="estudiante">Sí</label><br>
        <input type="radio" id="cargo" name="cargo" value="False" required>
        <label for="profesor">No</label><br><br>

        <input type="submit" value="Borrar" name="Borrar">
    </form>
    <br>
    <a href=../flujo_ventanas.php>Regresar</a>

</body>
</html>