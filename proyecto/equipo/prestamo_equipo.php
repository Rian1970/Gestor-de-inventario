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
    <title>Prestamo equipo de laboratorio</title>
</head>
<body>
    <h1>Prestamo de equipo de laboratorio</h1>

        <h2>Equipos disponibles</h2>
        <!-- <table border="1">
            <tr><th>Nombre</th><th>Modelo</th><th>Categoria</th></tr>
        </table><br> -->

    <?php
    
    require_once('../entidades/Equipo.php'); 
    require_once('../impl/daoEquipoImpl.php'); 

    $equipoDAO = new daoEquipoImpl("localhost", "root", "", "InventarioLab");

    $equipos = $equipoDAO->getTodosEquipos();
    
    ?>
    <form method="post" action="pedir.php">
        <?php
            if (!empty($equipos)) {
                echo '<table border="1">';
                echo '<tr><th>Nombre</th><th>No Serie</th><th>Categoria</th><th>Estado del equipo</th></tr>';
                foreach ($equipos as $equipos) {
                    if($equipos->getEstadoE() === "Disponible"){
                    echo '<tr>';
                    echo '<td>' . $equipos->getNombre() . '</td>';
                    echo '<td>' . $equipos->getSerie() . '</td>';
                    echo '<td>' . $equipos->getCategoria() . '</td>';
                    // echo '<td>' . $equipos->getFechaC() . '</td>';
                    echo '<td>' . $equipos->getEstadoE() . '</td>';
                    // echo '<td>' . $equipos->getSalon() . '</td>';
                    $id = $equipos->getEquipoId();
                    echo "<td><input type='checkbox' name='opciones[]' id='$id' value='$id'><br>";
                    echo '</tr>';
                    }
                }
                echo '</table>';
            } else {
                echo '<p>No se encontraron equipos en la base de datos.</p>';
            }
        
        ?>
        
        <h3>Introduce la fecha de prestamo</h3>
        <label for="fechaPrestamo">Fecha de prestamo</label>
        <input type="date" id="fechaPrestamo" name="fechaPrestamo" required min="<?php echo date('Y-m-d'); ?>"><br><br>
    
        <button type="submit" name="pedir" value="pedir">Pedir</button>
    </form>
    <br>
    <a href=../flujo_ventanas.php>Regresar</a>
</body>
</html>