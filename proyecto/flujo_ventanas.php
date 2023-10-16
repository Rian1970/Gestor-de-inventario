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
    <title>Flujo principal</title>
</head>
<body>
    <h1>Selecciona la acción que deseas hacer</h1>

    <h2>Usuarios</h2>
    <a href="usuarios/actualiza_usuario.php">Actualizar informacion</a><br>
    <a href="usuarios/eliminar.php">Eliminar usuario</a>
    <!-- Solo el mismo usuario puede dar de baja -->

    <h2>Equipo</h2>
    <a href="equipo/nuevo_equipo.html">Agregar equipo nuevo</a><br>
    <a href="equipo/prestamo_equipo.php">Pedir prestado un equipo</a><br>
    <a href="equipo/devolucion_equipo.php">Devolver equipo</a><br>
    <a href="equipo/eliminar_equipo.php">Eliminar equipo</a>

    <h2>Salon</h2>
    <a href="salon/gestion_salon.php">Ver gestión de salones</a><br>
    <a href="salon/ver_salon.php">Editar gestión de salones</a><br>
    <a href="salon/nuevo_salon.html">Agregar nuevo salón</a><br>

    <br><br><br><a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>