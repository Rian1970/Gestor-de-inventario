<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestamo equipo de laboratorio</title>
</head>
<body>
    <h1>Prestamo de equipo de laboratorio</h1>

        <label for="matricula">Matricula del usuario</label>
        <input type="text" id="matricula" name="matricula"><br><br>

        <h2>Equipos disponibles</h2>
        <!-- <table border="1">
            <tr><th>Nombre</th><th>Modelo</th><th>Categoria</th></tr>
        </table><br> -->

    <?php
    // Incluir la clase Libro y la clase LibroDAOMySQL
    require_once('Equipo.php'); // Asegúrate de que Libro.php contiene la definición de la clase Libro
    require_once('daoEquipoImpl.php'); // Asegúrate de que LibroDAOMySQL.php contiene la definición de la clase LibroDAOMySQL

    // Crear una instancia de LibroDAOMySQL (proporciona los detalles de conexión)
    $equipoDAO = new daoEquipoImpl("localhost", "root", "", "InventarioLab");

    // Obtener todos los libros desde la base de datos y ordenarlos según la selección del usuario
    $equipos = $equipoDAO->getTodosEquipos();

    // Mostrar la lista de libros en una tabla
    if (!empty($equipos)) {
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>No Serie</th><th>Categoria</th><th>Fecha Compra</th><th>Estado del equipo</th><th>Salon</th></tr>';
        foreach ($equipos as $equipos) {
            echo '<tr>';
            echo '<td>' . $equipos->getNombre() . '</td>';
            echo '<td>' . $equipos->getSerie() . '</td>';
            echo '<td>' . $equipos->getCategoria() . '</td>';
            echo '<td>' . $equipos->getFechaC() . '</td>';
            echo '<td>' . $equipos->getEstadoE() . '</td>';
            echo '<td>' . $equipos->getSalon() . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo '<p>No se encontraron equipos en la base de datos.</p>';
    }
    ?>
    
    <label for="fechaPrestamo">Fecha de prestamo</label>
        <input type="date" id="fechaPrestamo" name="fechaPrestamo"><br><br>

</body>
</html>