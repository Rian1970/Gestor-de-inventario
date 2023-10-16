<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar equipo</title>
</head>
<body>
    
    <?php

    require_once('../entidades/Equipo.php'); 
    require_once('../impl/daoEquipoImpl.php'); 

    $equipoDAO = new daoEquipoImpl("localhost", "root", "", "InventarioLab");

    // Obtener los valores introducidos por el usuario
    $id = 0;
    $estadoE = "Disponible";
    $categoria = $_POST['categoria'];
    $salon = "Null";
    $serie = $_POST['noSerie'];
    $nombre = $_POST['nombreEquipo'];
    $fechaCompra = $_POST['fechaCompra'];

    $equipo = new equipo($id, $estadoE, $categoria, $salon, $serie, $nombre, $fechaCompra);

    $equipoDAO->guardarEquipo($equipo);

    echo "El equipo ha sido creado.<br>";
    echo "<a href=../flujo_ventanas.php>Regresar</a>";
    ?>
</body>
</html>