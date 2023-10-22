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
    require_once('../impl/daoEquipoImpl.php'); 

    $equipoDAO = new daoEquipoImpl("localhost", "root", "", "InventarioLab");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
     
                if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
                    $seleccionadas = count($_POST["opciones"]);
                    $opcionesSeleccionadas = $_POST["opciones"];
        
                        foreach ($opcionesSeleccionadas as $opcion) {
                            // echo "<br>" . $opcion;
                            $equipoDAO->borrarEquipo($opcion);
                        }
                        echo "Se ha borrado con éxito.<br>";
                        echo "<a href=../flujo_ventanas.php>Regresar</a>";
                }else{
                    echo "No has seleccionado ninguna opción.<br>";
                    echo "<a href=eliminar_equipo.php>Regresar</a>";
                }
                // echo "Botón borrar fue presionado.";
        
    }
?>