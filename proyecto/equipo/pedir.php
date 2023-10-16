<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];
    // echo "HOLA";
  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion";
    die();
  }
?>
<?php
    require_once('../impl/daoPrestamoImpl.php'); 
    // echo "HOLA";
    $prestamoDAO = new daoPrestamoImpl("localhost", "root", "", "InventarioLab");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // echo "HOLA";
        if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
            $seleccionadas = count($_POST["opciones"]);
            $opcionesSeleccionadas = $_POST["opciones"];
            $fecha1 = $_POST["fechaPrestamo"];

                foreach ($opcionesSeleccionadas as $opcion) {
                    //echo "<br>" . $opcion;
                    $prestamoDAO->guardarPrestamo($varsesion, $opcion, $fecha1);
                }
                echo "Se ha prestado con éxito.<br>";
                echo "<a href=../flujo_ventanas.php>Regresar</a>";
        }else{
            echo "No has seleccionado ninguna opción.<br>";
            echo "<a href=prestamo_equipo.php>Regresar</a>";
        }
        // echo "Botón borrar fue presionado.";
        
    }
?>