<?php include('../conec.php'); ?>
<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>A´BAK SOLUCIONES</title>
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <!--datatables boostrap-->
    <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <!--datatables bootstrap responsive-->
    <link rel="stylesheet" href="template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="template/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="template/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="template/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include "assets/menuGerente.php";
        ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="table-responsive">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Usuarios</h1>
                        </div>
                        <div class="box">
                            <br>
                            <table class="table table-bordered table-hover table-striped table-condensed" id="miTabla">
                                <thead>
                                    <tr>
                                        <th>Clave usuario</th>
                                        <th>Nombre</th>
                                        <th>Apellido paterno</th>
                                        <th>Apellido materno</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th>Departamento</th>
                                        <th>Rol</th>
                                        <th>Puesto</th>
                                        <th>Sexo</th>
                                        <th>Sucursal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include('conec.php');/*Conexión a la Base de Datos*/
                                    $Consulta = "SELECT usuario.clave_usuario, usuario.nombre,usuario.Apaterno,usuario.Amaterno, usuario.telefono, usuario.correo, departamento.nombre_dep AS fk_departamento, 
                                    roles.rol AS fk_rol, puesto.nombre_puesto AS fk_puesto, sucursal.nombre_suc AS fk_sucursal, usuario.sexo  
                                    FROM usuario INNER JOIN sucursal ON usuario.fk_sucursal = sucursal.id INNER JOIN puesto ON usuario.fk_puesto = puesto.id
                                    INNER JOIN departamento ON usuario.fk_departamento = departamento.id 
                                    INNER JOIN roles ON usuario.fk_rol = roles.id";

                                    $resultado = mysqli_query($conexion, $Consulta);
                                    while ($fila = mysqli_fetch_array($resultado)) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $fila["clave_usuario"] ?></th>
                                            <td><?php echo $fila["nombre"] ?></td>
                                            <td><?php echo $fila["Apaterno"] ?></td>
                                            <td><?php echo $fila["Amaterno"] ?></td>
                                            <td><?php echo $fila["telefono"] ?></td>
                                            <td><?php echo $fila["correo"] ?></td>
                                            <td><?php echo $fila["fk_departamento"] ?></td>
                                            <td><?php echo $fila["fk_rol"] ?></td>
                                            <td><?php echo $fila["fk_puesto"] ?></td>
                                            <td><?php echo $fila["sexo"] ?></td>
                                            <td><?php echo $fila["fk_sucursal"] ?></td>
                                            <!--Boton Eliminar Usuarios-->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!--Script para el lenguaje en español e inicializacion de datatables-->
    <script src="tablas.js"></script>
    <!-- Resolve template/conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstratemplate/p 4 -->
    <script src="template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="template/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparklin -->
    <script src="template/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="template/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="template/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="template/plugins/moment/moment.min.js"></script>
    <script src="template/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="template/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

    <head>
        <!-- Otros elementos del encabezado -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- AdminLTE App -->
        <script src="template/dist/js/adminlte.js"></script>
</body>

</html>