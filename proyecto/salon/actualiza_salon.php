<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];

  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion";
    die();
  }
?>
<?php
    require_once('../impl/daoSalonImpl.php'); 

    $salonDAO = new daoSalonImpl("localhost", "root", "", "InventarioLab");


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["opciones"])) {
        $opcionesSeleccionadas = $_POST["opciones"];
        
        if (!empty($opcionesSeleccionadas)) {
            //echo "Casillas seleccionadas:";
            foreach ($opcionesSeleccionadas as $opcion) {
                // echo $opcion;
                $salonDAO->actualizaSalon($opcion);
                echo "Se ha actualizado con éxito.<br>";
                echo "<a href=../flujo_ventanas.html>Regresar</a>";
            }
        } else {
            echo "Ninguna casilla seleccionada.";
            echo "<a href=procesar.php>Regresar</a>";
        }
    }
?>
