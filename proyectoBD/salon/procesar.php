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
    require_once('../entidades/Salon.php'); 
    require_once('../entidades/Gestion.php');

    $salonDAO = new daoSalonImpl("localhost", "root", "", "InventarioLab");
    $saloncito = $salonDAO->getSalones();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["editar"]) && $_POST["editar"] === "editar") {
                
                if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
                    $seleccionadas = count($_POST["opciones"]);
                    $opcionesSeleccionadas = $_POST["opciones"];
        
                    if ($seleccionadas > 1) {
                        echo "Para editar selecciona solo una opción.<br><br>";
                        echo "<a href=ver_salon.php>Regresar</a>";
                    } else {
                        // echo "Una o ninguna casilla de verificación está seleccionada.";
                        foreach ($opcionesSeleccionadas as $opcion) {
                            // echo "<br>" . $opcion;
                            // echo "<br>" . $varsesion;
                            //$salones = $salonDAO->getSalones($opcion);
                            
                        }
                        $salonDAO->actualizaSalon($opcion, $varsesion);
                        echo "<br>Se ha actualizado con éxito.<br><br>";
                        echo "<a href=../flujo_ventanas.php>Regresar</a>";
                        echo "<br><br><h3>Puedes ver que ahora gestionas el salon en salon->ver salon.</h3>";
                    }
                }else{
                    echo "No has seleccionado ninguna opción.<br><br>";
                    echo "<a href=ver_salon.php>Regresar</a>";
                }

                // echo "Botón editar fue presionado.";
            } elseif (isset($_POST["borrar"]) && $_POST["borrar"] === "borrar") {
                
                if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
                    $seleccionadas = count($_POST["opciones"]);
                    $opcionesSeleccionadas = $_POST["opciones"];
        
                        foreach ($opcionesSeleccionadas as $opcion) {
                            //echo "<br>" . $opcion;
                            $salonDAO->borrarSalon($opcion);
                        }
                        echo "Se ha borrado con éxito.<br><br>";
                        echo "<a href=ver_salon.php>Regresar</a>";
                        echo "<br><br><h3>Puedes ver que se haborrado la gestión del salon en salon->ver salon.</h3>";
                }else{
                    echo "No has seleccionado ninguna opción.<br><br>";
                    echo "<a href=ver_salon.php>Regresar</a>";
                }

                // echo "Botón borrar fue presionado.";
            }
        }
        // if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
        //     $seleccionadas = count($_POST["opciones"]);
        //     $opcionesSeleccionadas = $_POST["opciones"];

        //     if ($seleccionadas > 1) {
        //         echo "Más de una casilla de verificación está seleccionada.";
        //         foreach ($opcionesSeleccionadas as $opcion) {
        //             //echo "<br>" . $opcion;
        //             $salonDAO->borrarSalon($opcion);
        //         }
        //         echo "Se ha borrado con éxito.";
        //         echo "<a href=../flujo_ventanas.html>Regresar</a>";
        //     } else {
        //         echo "Una o ninguna casilla de verificación está seleccionada.";
        //         foreach ($opcionesSeleccionadas as $opcion) {
        //             echo "<br>" . $opcion;
        //         }
        //     }
        // }else{
        //     echo "No has seleccionado ninguna opción.<br>";
        //     echo "<a href=ver_salon>Regresar</a>";
        // }
    }
?>
