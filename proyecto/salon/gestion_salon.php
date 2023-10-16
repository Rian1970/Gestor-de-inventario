<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salones</title>
</head>
<body>
    <h1>Ver salones</h1>

    <?php
    // Incluir la clase Libro y la clase LibroDAOMySQL
    require_once('../entidades/Salon.php'); 
    require_once('../entidades/Gestion.php'); 
    require_once('../impl/daoSalonImpl.php'); 
    
    $salonDAO = new daoSalonImpl("localhost", "root", "", "InventarioLab");

    // Obtener todos los libros desde la base de datos y ordenarlos según la selección del usuario
    $salones = $salonDAO->getTodosSalones();
    ?>

        <?php
            // Mostrar la lista 
            if (!empty($salones)) {
                echo '<table border="1">';
                echo '<tr><th>Nombre encargado</th><th>Número de salón</th><th>Tipo de salón</th></tr>';
                foreach ($salones as $salones) {
                    echo '<tr>';
                    echo '<td>' . $salones->getNombre() . '</td>';
                    echo '<td>' . $salones->getNumSalon() . '</td>';
                    echo '<td>' . $salones->getTipoSalon() . '</td>';
                    // $id = $salones->getGestionId();
                    // echo "<td><input type='checkbox' name='opciones[]' id='$id' value='$id'><br>";
                    // echo '<td><input type="checkbox" name="id" id="id" value='$id'></td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo '<p>No se encontraron salones en la base de datos.</p>';
            }
        ?>
    <br>
    <a href=../flujo_ventanas.php>Regresar</a>

</body>
</html>

<!-- <!DOCTYPE html>
<html>
<head>
    <title>Tabla con Casillas de Verificación</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>Item 1:</td>
            <td><input type="checkbox" name="item1" id="item1"></td>
        </tr>
        <tr>
            <td>Item 2:</td>
            <td><input type="checkbox" name="item2" id="item2"></td>
        </tr>
        <tr>
            <td>Item 3:</td>
            <td><input type="checkbox" name="item3" id="item3"></td>
        </tr>
    </table>
</body>
</html>  -->
