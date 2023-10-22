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
    require_once('../impl/daoUsuarioImpl.php'); 
    require_once('../entidades/Usuario.php'); 

    $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (isset($_POST["editar"]) && $_POST["editar"] === "editar") {
                
                if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
                    $seleccionadas = count($_POST["opciones"]);
                    $opcionesSeleccionadas = $_POST["opciones"];
        
                    if ($seleccionadas > 1) {
                        echo "Para editar selecciona solo una opción.<br><br>";
                        echo "<a href=paginacion.php>Regresar</a>";
                    } else {
                        // echo "Una o ninguna casilla de verificación está seleccionada.";
                        foreach ($opcionesSeleccionadas as $opcion) {
                            // echo "<br>" . $opcion;
                            $op = $opcion;
                            // echo "<br>" . $varsesion;
                            
                        }
                        header("Location: editar.php?op=". $op);
                    }
                }else{
                    echo "No has seleccionado ninguna opción.<br><br>";
                    echo "<a href=paginacion.php>Regresar</a>";
                }

                // echo "Botón editar fue presionado.";
            } elseif (isset($_POST["borrar"]) && $_POST["borrar"] === "borrar") {
                
                if (isset($_POST["opciones"]) && is_array($_POST["opciones"])) {
                    $seleccionadas = count($_POST["opciones"]);
                    $opcionesBorrar = $_POST["opciones"];

                    foreach ($opcionesBorrar as $opcion) {
                        // echo "<br>" . $opcion;
                        $usuarioDAO->borrarUsuario($opcion);
                      }
                      echo "Se ha borrado con éxito.<br><br>";
                      echo "<a href=paginacion.php>Regresar</a>";
        
                }else{
                    echo "No has seleccionado ninguna opción.<br><br>";
                    echo "<a href=paginacion.php>Regresar</a>";
                }

                // echo "Botón borrar fue presionado.";
            }
        }
    }
?>
