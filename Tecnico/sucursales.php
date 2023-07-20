<?include "../conec.php"; ?>
<?php
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
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
    <title>Sucursales</title>
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
                                <h1 class="m-2">Sucursales</h1>
                            </div>
                            <div class="box">
                <br>
                    <table class="table table-bordered table-hover table-striped" id="miTabla" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Municipio</th>
                                <th>Ciudad</th>
                                <th>Empresa</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Responsable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conec.php');/*Conexión a la Base de Datos*/
                            $Consulta = "SELECT sucursal.id, sucursal.nombre_suc, estados.nombre AS fk_estado, municipio.nombre AS fk_municipio, ciudades.nombre AS fk_ciudad, 
                            empresa.nombre AS fk_empresa, sucursal.direccion, sucursal.telefono, usuario.clave_usuario AS fk_responsable FROM sucursal
                            INNER JOIN estados ON sucursal.fk_estado = estados.id INNER JOIN municipio ON sucursal.fk_municipio = municipio.id INNER JOIN ciudades ON sucursal.fk_ciudad = ciudades.id
                            INNER JOIN empresa ON sucursal.fk_empresa = empresa.id INNER JOIN usuario ON sucursal.fk_responsable = usuario.clave_usuario";

                            $resultado = mysqli_query($conexion, $Consulta);
                            $contador = 1;
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $fila["id"] ?></th>
                                    <td><?php echo $fila["nombre_suc"] ?></td>
                                    <td><?php echo $fila["fk_municipio"] ?></td>
                                    <td><?php echo $fila["fk_ciudad"] ?></td>
                                    <td><?php echo $fila["fk_empresa"] ?></td>
                                    <td><?php echo $fila["direccion"] ?></td>
                                    <td><?php echo $fila["telefono"] ?></td>
                                    <td><?php echo $fila["fk_responsable"] ?></td>
                                </tr>
                            <?php 
                            $contador++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
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