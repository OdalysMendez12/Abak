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
<meta charset="UTF-8">
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
    <title>Asignaciones</title>
</head>
<body>
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
                            <h1 class="m-2">Asignaciones</h1>
                        </div>
                    <div class="box">
                        <div class="box-header">
                            <button class="btn btn-primary" data-toggle="modal" data-target="#CrearAsig">Crear nueva asignación</button>
                        </div>
                        <br>
                            <!-- Resto del contenido -->
                            <table class="table table-bordered table-hover table-striped" id="miTabla">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Clave del usuario</th>
                                        <th>Clave del equipo</th>
                                        <th>Sucursal</th>
                                        <th>Fecha de la asignación</th>
                                        <th>Fecha devolución</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('../conec.php');
                                    $consulta = "SELECT asignaciones.id, usuario.clave_usuario AS fk_clave_usuario, catalogo_equipo.clave_equipo AS fk_clave_equipo, sucursal.nombre_suc AS fk_sucursal,asignaciones.fecha_asignacion, asignaciones.fecha_devuelta FROM asignaciones
                                    LEFT JOIN usuario ON asignaciones.fk_clave_usuario = usuario.clave_usuario
                                    LEFT JOIN sucursal ON asignaciones.fk_sucursal = sucursal.id
                                    LEFT JOIN catalogo_equipo ON asignaciones.fk_clave_equipo = catalogo_equipo.clave_equipo";

                                    $resultado = mysqli_query($conexion, $consulta);
                                    $contador = 1;
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $fila["id"] ?></th>
                                            <td><?php echo $fila["fk_clave_usuario"] ?></td>
                                            <td><?php echo $fila["fk_clave_equipo"] ?></td>
                                            <td><?php echo $fila["fk_sucursal"] ?></td>
                                            <td><?php echo $fila["fecha_asignacion"] ?></td>
                                            <td><?php echo $fila["fecha_devuelta"] ?></td>
                                            <td>
                                                <button class="btn btn-success" style="margin-left: 0%;" data-toggle="modal" data-target="#EditarAsig<?php echo $contador ?>">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button class="btn btn-danger" style="margin-left: 1%;">
                                                    <a target="_self" href="../acciones/eliminarAsig.php?id=<?php echo $fila['id'] ?>">
                                                        <i class="fas fa-trash text-white"></i>
                                                    </a>
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- Modal de edición -->
                                        <div class="modal fade" id="EditarAsig<?php echo $contador ?>">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="../acciones/editarAsig.php" method="POST">
                                                        <div class="modal-body">
                                                            <h2 style="margin-bottom: 1rem; text-align: center;">Editar Asignación</h2>
                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <h2>ID:</h2>
                                                                    <input class="form-control" type="text" name="id" value="<?php echo $fila['id'] ?>" readonly>
                                                                </div>
                                                                <div class="form-group">
                                                                    <h2>Fecha de devolución:</h2>
                                                                    <?php date_default_timezone_set('America/Cancun'); ?>
                                                                    <input type="text" class="form-control input-lg" name="fecha_devuelta" value="<?php echo date('Y-m-d H:i:s'); ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input type="submit" name="Enviar" value="Editar Asignación" class="btn btn-primary" />
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
    <div class="modal fade" id="CrearAsig">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../acciones/regAsig.php" method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Ingresa el usuario:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_clave_usuario">
                                <?php
                                include('../conec.php');
                                    $consultaUser = "SELECT * FROM usuario";
                                    $resultadoUser = mysqli_query($conexion, $consultaUser);
                                    while ($fila = mysqli_fetch_array($resultadoUser)) {
                                ?>
                            <option value="<?php echo $fila["clave_usuario"] ?>"><?php echo $fila["nombre"] ?> <?php echo $fila["Apaterno"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Selecciona la sucursal:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_sucursal">
                                <?php
                                include('../conec.php');
                                $consultasucursal = "SELECT * FROM sucursal";
                                $resultadosucursal = mysqli_query($conexion, $consultasucursal);
                                while ($fila = mysqli_fetch_array($resultadosucursal)) {
                                    ?>
                                    <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre_suc"] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Selecciona el equipo:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_clave_equipo">
                                <?php
                                include('../conec.php');
                                    $consultaequipo = "SELECT fk_clave_equipo FROM equipo";
                                    $resultadoequipo = mysqli_query($conexion, $consultaequipo);
                                    while ($fila = mysqli_fetch_array($resultadoequipo)) {
                                ?>
                            <option value="<?php echo $fila["fk_clave_equipo"] ?>"><?php echo $fila["fk_clave_equipo"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Fecha de asignación:</h2>
                            <?php date_default_timezone_set('America/Cancun'); ?>
                            <input type="text" name="fecha_asignacion" class="form-control" value="<?php echo date('Y-m-d H:i:s'); ?>" readonly>
                        </div>
                </div>
                <div class="modal-footer">
                <input type="submit" name="Enviar" value="Agregar Asignación" class="btn btn-primary" />
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
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
