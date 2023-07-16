<?php
include "../conec.php";
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: ../i_sesion.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!--datatables boostrap-->
    <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!--datatables bootstrap responsive-->
    <link rel="stylesheet" href="../template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../template/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Inventario</title>
</head>
<body>
    
<?php
    include ('../conec.php');
// Obtener el valor de la sucursal seleccionada desde el parámetro GET
$idSucursal = $_GET['id'] ?? null;

// Consulta SQL para obtener el inventario de la sucursal seleccionada
$consultaInventario = "SELECT * FROM equipo WHERE fk_sucursal = ?";
$stmt = mysqli_prepare($conexion, $consultaInventario);
mysqli_stmt_bind_param($stmt, 'i', $idSucursal);
mysqli_stmt_execute($stmt);
$resultadoInventario = mysqli_stmt_get_result($stmt);

?>
<!-- Agrega aquí el código HTML y la estructura de la tabla para mostrar el inventario -->
<?php
    include ('../conec.php');
?>

<div class="wrapper">
    <?php
    include "menu.php";
    ?>

    <div class="content-wrapper">
        <div class="content-header">
            <div class="container">
                <div class="col-mb-6">
                    <div class="col-9">
                        <h1 class="m-2">Inventario</h1>
                    </div>
                    <div class="box">
                        <div class="box-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#CrearInv">Agregar equipo</button>
                        </div>
                        <br>
                        <!-- Resto del contenido -->
                        <table class="table table-sm table-bordered table-hover table-striped" id="miTabla">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Equipo</th>
                                    <th>Marca</th>
                                    <th>Componentes</th>
                                    <th>Estado del equipo</th>
                                    <th>Sistema Operativo</th>
                                    <th>Mac Address</th>
                                    <th>Factura</th>
                                    <th>Stock</th>
                                    <th>Paqueteria</th>
                                    <th>Sucursal</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include('../conec.php');
                                $consulta = "SELECT equipo.id, catalogo_equipo.nombre AS fk_clave_equipo, marca.nombre AS fk_marca, componentes.nombre_componente AS fk_componentes,
                                estado_equipo.estado_equipo AS fk_estado_equipo, so.nombre_so AS fk_SO, paqueteria.nombre AS fk_paqueteria, equipo.MacAddress, equipo.factura, equipo.stock, 
                                IFNULL(sucursal.nombre_suc, 'Sin sucursal') AS fk_sucursal FROM equipo 
                                LEFT JOIN catalogo_equipo ON equipo.fk_clave_equipo = catalogo_equipo.clave_equipo
                                LEFT JOIN marca ON equipo.fk_marca = marca.id_marca 
                                LEFT JOIN componentes ON equipo.fk_componentes = componentes.id
                                LEFT JOIN estado_equipo ON equipo.fk_estado_equipo = estado_equipo.id 
                                LEFT JOIN so ON equipo.fk_SO = so.id
                                LEFT JOIN paqueteria ON equipo.fk_paqueteria = paqueteria.id
                                LEFT JOIN sucursal ON equipo.fk_sucursal = sucursal.id
                                WHERE equipo.fk_sucursal = ?";
                                $stmt = mysqli_prepare($conexion, $consulta);
                                mysqli_stmt_bind_param($stmt, 'i', $idSucursal);
                                mysqli_stmt_execute($stmt);
                                $resultado = mysqli_stmt_get_result($stmt);
                                $contador = 1;
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $fila["id"] ?></th>
                                        <td><?php echo $fila["fk_clave_equipo"] ?></td>
                                        <td><?php echo $fila["fk_marca"] ?></td>
                                        <td><?php echo $fila["fk_componentes"] ?></td>
                                        <td><?php echo $fila["fk_estado_equipo"] ?></td>
                                        <td><?php echo $fila["fk_SO"] ?></td>
                                        <td><?php echo $fila["MacAddress"] ?></td>
                                        <td><?php
                                    // Obtener los datos de la imagen de la columna BLOB
                                    $imagen = $fila["factura"];                                        
                                    // Verificar si se ha cargado una imagen
                                    if (!empty($imagen)) {
                                        // Generar un nombre de archivo temporal
                                        $tmpFile = tempnam(sys_get_temp_dir(), 'img');                                            
                                        // Guardar los datos de la imagen en el archivo temporal
                                        file_put_contents($tmpFile, $imagen);
                                        // Obtener la extensión del archivo
                                        $extension = pathinfo($tmpFile, PATHINFO_EXTENSION);                                            
                                        // Definir el tipo de contenido basado en la extensión del archivo
                                        $tipoContenido = 'image/' . $extension;                                            
                                        // Mostrar la imagen
                                        echo '<a href="data:' . $tipoContenido . ';base64,' . base64_encode($imagen) . '" download="imagen.jpg">Descargar imagen</a>';
                                        // Eliminar el archivo temporal
                                        unlink($tmpFile);
                                    }
                                    ?>
                                        </td>
                                        <td><?php echo $fila["stock"] ?></td>
                                        <td><?php echo $fila["fk_paqueteria"] ?></td>
                                        <td><?php echo $fila["fk_sucursal"] ?></td>
                                        <td>
                                            <div class="d-flex">
                                                <button class="btn btn-success" data-toggle="modal" data-target="#EditarInv<?php echo $contador ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger" style="margin-left: 2%;">
                                                    <a target="_self" href="../acciones/eliminarInv.php?id=<?php echo $fila['id'] ?>">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </a>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- Modal de edición -->
                                    <div class="modal fade" id="EditarInv<?php echo $contador ?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="../acciones/editarInv.php" method="POST">
                                                    <div class="modal-body">
                                                        <h2 style="margin-bottom: 1rem; text-align: center;">Editar Asignación</h2>
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <h2>ID:</h2>
                                                                <input class="form-control" type="text" name="id" value="<?php echo $fila['id'] ?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <h3>Selecciona el estado del equipo:</h3>
                                                                <select class="form-control" aria-label="Default select example" name="fk_estado_equipo">
                                                                    <?php
                                                                    include('../conec.php');
                                                                    $consultaequipo = "SELECT * FROM estado_equipo";
                                                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                                                        ?>
                                                                        <option value="<?php echo $fila["id"] ?>"><?php echo $fila["estado_equipo"] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="submit" name="Enviar" value="Editar inventario" class="btn btn-primary" />
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                    $contador++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CrearInv">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="../acciones/regInv.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="box-body">
                            <div class="form-group">
                                <h3>Ingresa el equipo:</h3>
                                <select class="form-control" aria-label="Default select example" name="fk_clave_equipo">
                                    <?php
                                    include('../conec.php');
                                    $consultaUser = "SELECT * FROM catalogo_equipo";
                                    $resultadoUser = mysqli_query($conexion, $consultaUser);
                                    while ($fila = mysqli_fetch_array($resultadoUser)) {
                                        ?>
                                        <option value="<?php echo $fila["clave_equipo"] ?>"><?php echo $fila["nombre"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona la marca:</h3>
                                <select class="form-control" aria-label="Default select example" name="fk_marca">
                                    <?php
                                    include('../conec.php');
                                    $consultaequipo = "SELECT * FROM marca";
                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                        ?>
                                        <option value="<?php echo $fila["id_marca"] ?>"><?php echo $fila["nombre"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona los componentes:</h3>
                                <?php
                                include('../conec.php');
                                $consultaequipo = "SELECT * FROM componentes";
                                $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fk_componentes[]" value="<?php echo $fila["id"] ?>">
                                        <label class="form-check-label"><?php echo $fila["nombre_componente"] ?></label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona el estado del equipo:</h3>
                                <select class="form-control" aria-label="Default select example" name="fk_estado_equipo">
                                    <?php
                                    include('../conec.php');
                                    $consultaequipo = "SELECT * FROM estado_equipo";
                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                        ?>
                                        <option value="<?php echo $fila["id"] ?>"><?php echo $fila["estado_equipo"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona el sistema operativo:</h3>
                                <select class="form-control" aria-label="Default select example" name="fk_SO">
                                    <?php
                                    include('../conec.php');
                                    $consultaequipo = "SELECT * FROM so";
                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                        ?>
                                        <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre_so"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona las paqueterias:</h3>
                                <?php
                                include('../conec.php');
                                $consultaequipo = "SELECT * FROM paqueteria";
                                $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                    ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="fk_paqueteria[]" value="<?php echo $fila["id"] ?>">
                                        <label class="form-check-label"><?php echo $fila["nombre"] ?></label>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <h3>Selecciona la sucursal:</h3>
                                <select class="form-control" aria-label="Default select example" name="fk_sucursal">
                                    <?php
                                    include('../conec.php');
                                    $consultaequipo = "SELECT * FROM sucursal";
                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                        ?>
                                        <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre_suc"] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Factura</label>
                                    <input type="file" name="factura" class="form-control" multiple>
                                </fieldset>
                            </div>
                            <div class="form-group">
                                <h3>Ingresa la MacAddress del equipo:</h3>
                                <input type="text" class="form-control input-lg" name="MacAddress">
                            </div>
                            <div class="form-group">
                                <h3>Ingresa el stock:</h3>
                                <input type="text" class="form-control input-lg" name="stock">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" name="Enviar" value="Agregar inventario" class="btn btn-primary" />
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!--Script para el lenguaje en español e inicializacion de datatables-->
    <script src="tablas.js"></script>
        <!-- Resolve template/conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstratemplate/p 4 -->
        <script src="../template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../template/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparklin -->
        <script src="../template/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="../template/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../template/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../template/plugins/moment/moment.min.js"></script>
        <script src="../template/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../template/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../template/dist/js/adminlte.js"></script>
        </body>
</html>