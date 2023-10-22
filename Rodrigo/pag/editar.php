<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];

  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion";
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <base href="./">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- importa animaciones con CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <!-- Importa estilos css con bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Actualiza usuario</title>
</head>
<body>

    <div class="container-fluid text-center">    
        <div class="row content">
        
            <!-- Región izquierda -->
            <div class="col-sm-2 sidenav">
            </div>

            <!-- Región central -->
            <div class="col-sm-8 text-left">
                <h1 class="animate__animated animate__bounce">Actualiza tu información de usuario</h1> <!-- La clase anima el título -->
                
                <form action="" method="post" >

                    <label for="cargo">Selecciona el nuevo cargo</label><br>
                    <!-- Campo cargo -->
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="cargo" name="cargo" value="Estudiante" required>
                            <label class="form-check-label" for="estudiante">Estudiante</label><br>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="cargo" name="cargo" value="Profesor" required>
                            <label class="form-check-label" for="profesor">Profesor</label><br>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="cargo" name="cargo" value="Laboratorista" required>
                            <label class="form-check-label" for="laboratorista">Laboratorista</label><br><br>
                        </div>
                    </div>

                    <input type="submit" value="Actualizar" name="Actualizar"><br><br>
                </form>
    
                <a href=paginacion.php>Regresar</a>

                <?php
                require_once('../entidades/Usuario.php'); 
                require_once('../impl/daoUsuarioImpl.php'); 

                $usuarioDAO = new daoUsuarioImpl("localhost", "root", "", "InventarioLab");
                
                $nuevoCargo = $_POST["cargo"];

                // echo $varsesion;
                // echo $nuevoCargo;
                $op = $_GET['op'];
                
                $exito = $usuarioDAO->actualizarUsuario($op, $nuevoCargo);

                if($exito === True && isset($_POST["Actualizar"])){
                    echo "<br><br>Se ha actualizado con éxito.<br>";
                    // echo "<a href=../flujo_ventanas.php>Regresar</a>";
                }else{
                    // echo "Chale";
                }
                
                
                ?>
            </div>

            <!-- Región derecha -->
            <div class="col-sm-2 sidenav">
                
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
