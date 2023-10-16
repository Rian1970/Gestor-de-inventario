<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];
//   echo "Estas vetado";
  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion";
    die();
  }
?>

<?php
    require_once('../entidades/Usuario.php'); 
    require_once('../impl/daoUsuarioImpl.php'); 

    $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");
    
    $nuevoCargo = $_POST["cargo"];

    // echo $varsesion;
    // echo $nuevoCargo;

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        if($nuevoCargo == "True"){

            $usuarioDAO->borrarUsuario($varsesion);
            // echo "Se ha actualizado con éxito.<br>";
            // echo "<a href=../flujo_ventanas.html>Regresar</a>";
            session_start();

            // Destruir la sesión
            session_destroy();

            // Redirigir al usuario a la página de inicio de sesión o a donde desees
            echo "Estas vetado";
            exit();
        }else{
            echo "Chale";

        }
    }
    
    
    ?>