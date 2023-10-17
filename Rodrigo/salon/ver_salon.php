<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION["id_usuario"];

  if($varsesion == null || $varsesion == ''){
    echo "Usted no tiene autorizacion<br>";
    echo "<a class='navbar-brand' href='./index.php'>Regresar al inicio</a>";
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

    <title>Salones</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Inicio</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Usuarios -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!--a class="dropdown-item" href="#">Ver</a-->
                        <a class="dropdown-item" href="../usuarios/actualiza_usuario.php">Actualizar</a>
                        <a class="dropdown-item" href="../usuarios/eliminar.php">Eliminar</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Equipo -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Equipo
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../equipo/nuevo_equipo.php">Alta</a>
                        <a class="dropdown-item" href="../equipo/prestamo_equipo.php">Solicitar</a>
                        <a class="dropdown-item" href="../equipo/devolucion_equipo.php">Devolución</a>
                        <a class="dropdown-item" href="../equipo/eliminar_equipo.php">Eliminar</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Salón -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Salón
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!--a class="dropdown-item" href="#">Ver</a-->
                        <a class="dropdown-item" href="../salon/gestion_salon.php">Ver</a>
                        <a class="dropdown-item" href="../salon/nuevo_salon.php">Agregar</a>
                        <a class="dropdown-item" href="../salon/ver_salon.php">Editar</a>
                    </div>
                </li>
            </ul>
        </div>

        <a href="../cerrar_sesion.php">Cerrar Sesión</a>

    </nav> 

    <div class="container-fluid text-center">    
        <div class="row content">
        
            <!-- Región izquierda -->
            <div class="col-sm-2 sidenav">
            </div>

            <!-- Región central -->
            <div class="col-sm-8 text-left"> 
                <h1 class="animate__animated animate__bounce">Ver salones</h1>

                <h3>Salecciona una o más casillas si deseas borrar, si deseas editar la información solo selecciona una casilla.</h3>
                <h3>La casilla que selecciones es el salon que quieres gestionar</h3>

                <?php
                // Incluir la clase Libro y la clase LibroDAOMySQL
                require_once('../entidades/Salon.php'); 
                require_once('../entidades/Gestion.php'); 
                require_once('../impl/daoSalonImpl.php'); 
                
                $salonDAO = new daoSalonImpl("localhost", "root", "", "InventarioLab");

                // Obtener todos los libros desde la base de datos y ordenarlos según la selección del usuario
                $salones = $salonDAO->getSalones();
                ?>

                <form method="post" action="procesar.php">
                    <?php
                        // Mostrar la lista 
                        if (!empty($salones)) {
                            echo '<table border="1">';
                            echo '<tr><th>Número de salón</th><th>Tipo de salón</th></tr>';
                            foreach ($salones as $salones) {
                                echo '<tr>';
                                // echo '<td>' . $salones->getNombre() . '</td>';
                                echo '<td>' . $salones->getNumSalon() . '</td>';
                                echo '<td>' . $salones->getTipo() . '</td>';
                                $id = $salones->getSalonId();
                                echo "<td><input type='checkbox' name='opciones[]' id='$id' value='$id'><br>";
                                // echo '<td><input type="checkbox" name="id" id="id" value='$id'></td>';
                                echo '</tr>';
                            }
                            echo '</table>';
                        } else {
                            echo '<p>No se encontraron salones en la base de datos.</p>';
                        }
                    ?>
                    <br>
                    <button type="submit" name="editar" value="editar">Editar</button>
                    <button type="submit" name="borrar" value="borrar">Borrar</button><br>
                </form>
                <br>
                <a href=../flujo_ventanas.php>Regresar</a>
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
