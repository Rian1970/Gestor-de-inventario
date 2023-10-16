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
    <title>Devolucion equipo</title>
</head>
<body>
    <h1>Devolución de equipo de laboratorio</h1>
    
    <?php
    
    require_once('../entidades/Prestamo.php'); 
    require_once('../impl/daoPrestamoImpl.php'); 

    $prestamoDAO = new daoPrestamoImpl("localhost", "root", "", "InventarioLab");

    $equipos = $prestamoDAO->getTodosPrestamos($varsesion);
    
    ?>
    <form method="post" action="devolver.php">
        <?php
            if (!empty($equipos)) {
                echo '<table border="1">';
                echo '<tr><th>Nombre</th><th>Fecha de prestamo</th></tr>';
                foreach ($equipos as $equipos) {
                    if($equipos->getNombre() == $varsesion){
                    echo '<tr>';
                    // echo '<td>' . $equipos->getNombre() . '</td>';
                    echo '<td>' . $equipos->getUsuarioId() . '</td>';
                    // echo '<td>' . $equipos->getEquipoId() . '</td>';
                    echo '<td>' . $equipos->getFechaP() . '</td>';
                    // echo '<td>' . $equipos->getEstadoE() . '</td>';
                    // echo '<td>' . $equipos->getSalon() . '</td>';
                    $id = $equipos->getPrestamoId();
                    echo "<td><input type='checkbox' name='opciones[]' id='$id' value='$id'><br>";
                    echo '</tr>';
                    }
                }
                echo '</table>';
            } else {
                echo '<p>No se encontraron equipos prestados a tu nombre en la base de datos.</p>';
                
            }
        
        ?>
        <br>
        <button type="submit" name="devolver" value="devolver">Devolver</button>
    </form>
    <br>
    <a href=../flujo_ventanas.php>Regresar</a>
</body>
</html>