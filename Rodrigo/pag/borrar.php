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

    include 'procesar.php';
    require_once('../impl/daoUsuarioImpl.php'); 
    require_once('../entidades/Usuario.php'); 

    $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");

    //$opcionesBorrar = $_GET['opcionesBorrar'];
    echo $opcionesBorrar;
    echo $var;

    foreach ($opcionesBorrar as $opcion) {
      // echo "<br>" . $opcion;
      $usuarioDAO->borrarUsuario($opcion);
    }
    echo "Se ha borrado con éxito.<br>";
    echo "<a href=paginacion.php>Regresar</a>";

?>