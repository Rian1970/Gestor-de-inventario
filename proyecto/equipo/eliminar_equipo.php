<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar equipo de laboratorio</title>
</head>
<body>
    <h1>Selecciona los equipos para eliminar</h1>

        <h2>Solo se pueden eliminar los equipos disponibles, no los prestados</h2>
        <!-- <table border="1">
            <tr><th>Nombre</th><th>Modelo</th><th>Categoria</th></tr>
        </table><br> -->

    <?php
    
    require_once('../entidades/Equipo.php'); 
    require_once('../impl/daoEquipoImpl.php'); 

    $equipoDAO = new daoEquipoImpl("localhost", "root", "", "InventarioLab");

    $equipos = $equipoDAO->getTodosEquipos();
    
    ?>
    <form method="post" action="borrar.php">
        <?php
            if (!empty($equipos)) {
                echo '<table border="1">';
                echo '<tr><th>Nombre</th><th>No Serie</th><th>Categoria</th><th>Fecha de compra</th></tr>';
                foreach ($equipos as $equipos) {
                    if($equipos->getEstadoE() === "Disponible"){
                    echo '<tr>';
                    echo '<td>' . $equipos->getNombre() . '</td>';
                    echo '<td>' . $equipos->getSerie() . '</td>';
                    echo '<td>' . $equipos->getCategoria() . '</td>';
                    echo '<td>' . $equipos->getFechaC() . '</td>';
                    // echo '<td>' . $equipos->getEstadoE() . '</td>';
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
        <br>
        <button type="submit" name="borrar" value="borrar">Borrar</button>
    </form>
    <br>
    <a href=../flujo_ventanas.php>Regresar</a>
    
</body>
</html>