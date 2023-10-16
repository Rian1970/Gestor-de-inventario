<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar salon</title>
</head>
<body>
    
    <?php

    require_once('../entidades/Salon.php'); 
    require_once('../impl/daoSalonImpl.php'); 

    $salonDAO = new daoSalonImpl("localhost", "root", "", "InventarioLab");

    // Obtener los valores introducidos por el usuario
    $id = 0;
    $num = $_POST['numSalon'];
    $tipo = $_POST['tipoSalon'];

    $salon = new salon($id, $num, $tipo);

    $salonDAO->guardarSalon($salon);

    echo "El salon ha sido creado.<br>";
    echo "<a href=../flujo_ventanas.php>Regresar</a>";
    ?>
</body>
</html>