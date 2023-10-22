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
<?php
    // Incluye la clase de paginación
    require_once 'paginar.php';

    // Establece la conexión a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'InventarioLab');
    
    // Configura la codificación de caracteres a UTF-8
    $conexion->query("SET NAMES 'utf8'");
 
    // Obtiene el número de página actual o establece el valor predeterminado en 1
    $pagina = (isset($_GET['page'])) ? $_GET['page'] : 1; 
    
    // Obtiene el número de enlaces o establece el valor predeterminado en 5
    $enlaces = (isset($_GET['enlaces'])) ? $_GET['enlaces'] : 5;

    // Consulta SQL para obtener datos de la tabla 'libros'
    $consulta = "SELECT * FROM usuario";
    
    // Crea una instancia de la clase Paginar
    $paginar = new Paginar($conexion, $consulta);
    
    // Obtiene los datos paginados según la página actual
    $resultados = $paginar->getDatos($pagina);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Paginación en PHP</title>

        <!-- Incluye el estilo de Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous">

        <!-- Configura la codificación de caracteres en UTF-8 -->
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <div class="container">
            <div class="col-md-12 ">
                <h1 style="text-align:center">Páginacion</h1>

                <!-- Muestra los enlaces de paginación -->
                <ul class="pager">
                    <?php echo $paginar->crearLinks($enlaces); ?>
                </ul>

                <form method="post" action="procesar.php">
                    <!-- Muestra la tabla de resultados -->
                    <table class="table table-hover table-condensed table-bordered ">
                        <thead>
                            <tr style="background:#337ab7; color:white;">
                                <th width="15%">Nombre</th>
                                <th width="15%">Apellido P</th>
                                <th width="15%">Apellido M</th>
                                <th width="15%">Matricula</th>
                                <th width="15%">Cargo</th>
                                <th width="5%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($resultados->datos); $i++): ?>
                                <tr>
                                    <td><?php echo $resultados->datos[$i]['Nombre']; ?></td>
                                    <td><?php echo $resultados->datos[$i]['ApellidoP']; ?></td>
                                    <td><?php echo $resultados->datos[$i]['ApellidoM']; ?></td>
                                    <td><?php echo $resultados->datos[$i]['Matricula']; ?></td>
                                    <td><?php echo $resultados->datos[$i]['Tipo_Cargo']; ?></td>
                                    <?php  $id=$resultados->datos[$i]['Usuario_id']; ?>
                                    <td><?php echo "<input type='checkbox' name='opciones[]' id='$id' value='$id'>"?></td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                    <br>
                    <button type="submit" name="editar" value="editar">Editar</button>
                    <button type="submit" name="borrar" value="borrar">Borrar</button><br>
                </form>
                
                    

                <!-- Muestra los enlaces de paginación al final de la página -->
                <ul class="pagination">
                    <?php echo $paginar->crearLinks($enlaces); ?>
                </ul>
                <br>
                <a href=../flujo_ventanas.php>Regresar</a>
            </div>
        </div>
    </body>
</html>
