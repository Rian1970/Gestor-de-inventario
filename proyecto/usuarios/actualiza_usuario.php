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

    <title>Registro usuarios</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../">Inicio</a>

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
                        <a class="dropdown-item" href="./nuevo_usuario.php">Alta</a>
                        <!--a class="dropdown-item" href="#">Baja</a-->
                        <!--div class="dropdown-divider"></div-->
                        <a class="dropdown-item" href="./actualiza_usuario.php">Cambio</a>
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
                        <!--a class="dropdown-item" href="#">Ver</a-->
                        <a class="dropdown-item" href="../equipo/nuevo_equipo.php">Alta</a>
                        <!--a class="dropdown-item" href="#">Baja</a-->
                        <!--div class="dropdown-divider"></div-->
                        <!--a class="dropdown-item" href="#">Cambio</a-->
                    </div>
                </li>
            </ul>
        </div>

        <!-- Documentacion -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Documentación
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Ver</a>
                        <a class="dropdown-item" href="#">Alta</a>
                        <a class="dropdown-item" href="#">Baja</a>
                        <!--div class="dropdown-divider"></div-->
                        <a class="dropdown-item" href="#">Cambio</a>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Mantenimiento -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">      
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mantenimiento
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!--a class="dropdown-item" href="#">Ver</a-->
                        <a class="dropdown-item" href="../mantenimiento/nuevo_registro.php">Alta</a>
                        <!--a class="dropdown-item" href="#">Baja</a-->
                        <!--div class="dropdown-divider"></div-->
                        <a class="dropdown-item" href="../mantenimiento/actualizar_registro.php">Cambio</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid text-center">    
        <div class="row content">
        
            <!-- Región izquierda -->
            <div class="col-sm-4 sidenav">
                <h2>Usuarios</h2>

                <?php
                    $host = "localhost";
                    $usuario = "root";
                    $contrasena = "";
                    $base_de_datos = "inventariolab";

                    $mysqli = new mysqli($host, $usuario, $contrasena, $base_de_datos);

                    if ($mysqli->connect_error) {
                        die("Error de conexión: " . $this->conexion->connect_error);
                    }else{
                        // Se obtienen todos los usuarios
                        $query = "SELECT * FROM usuario";

                        if ($result = $mysqli->query($query)) {
                            echo "<table border='1'>";
                            echo "<tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cargo</th>
                                </tr>";

                            while ($row = $result->fetch_assoc()) {
                                $field1name = $row["Usuario_id"];
                                $field2name = $row["Tipo_Cargo"];
                                $field3name = $row["Matricula"];
                                $field4name = $row["Nombre"];
                                $field5name = $row["ApellidoP"];
                                $field6name = $row["ApellidoM"];
                                $field7name = $row["Contrasenia"];

                                echo '<tr>
                                        <td>'.$field4name.'</td> 
                                        <td>'.$field5name.'</td> 
                                        <td>'.$field2name.'</td> 
                                    </tr>';
                                
                            }
                            echo "</table>";
                            /*freeresultset*/
                            $result->free();
                        }
                    }
                ?>
                
            </div>

            <!-- Región central -->
            <div class="col-sm-8 text-left"> 
                <h1 class="animate__animated animate__bounce">Actualiza tu información de usuario</h1> <!-- La clase anima el título -->

                <!-- Documentación de bootstrap de un formulario: https://getbootstrap.com/docs/4.0/components/forms/ -->
                <form>
                    <!-- Campo cargo -->
                    <div class="form-group">
                        <label for="cargo">Cargo</label>
                        <input type="text" class="form-control" id="cargo" name="cargo" aria-describedby="emailHelp" placeholder="Ingresa el cargo">
                        <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                    </div>

                    <!-- Campo Departamento -->
                    <div class="form-group">
                        <label for="Departamento">Departamento</label>
                        <input type="text" class="form-control" id="Departamento" name="Departamento" aria-describedby="emailHelp" placeholder="Ingresa el departamento">
                        <!--small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small-->
                    </div>
                    <!--div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Recordar</label>
                    </div-->
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>

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