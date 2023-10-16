<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];

  if($varsesion == true){
    header("Location: flujo_ventanas.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Ingreso al sistema de inventario de laboratorio</h1>
    
    <form action="usuarios/valida.php" method="post">

        <label for="matricula">Matricula</label>
        <input type="text" id="matricula" name="matricula" placeholder="Matrícula" required><br><br>

        <label for="contrasenia">Contraseña</label>
        <input type="password" id="contrasenia" name="contrasenia" placeholder="Contrasenia" required><br><br>
        
        <div>
            <input type="checkbox">
            <label>Recordar</label>
        </div>
        <button type="submit">Entrar</button>
    </form>
    <h3>Si no estás registrado crea una cuenta</h3>
    <a href="usuarios/nuevo_usuario.html">Crear usuario</a>  
</body>
</html>