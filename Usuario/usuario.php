<?
include "conec.php"; ?>
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
    <link rel="stylesheet" href="../https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <link rel="stylesheet" href="../https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.css">
    <!-- ESTILO FORMULARIO NUEVO TICKET-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Tickets</title>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <?php
    include ('../conec.php');
    ?>
    <div class="wrapper">
        <?php
        include ('assets/menuUser.php');
        ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div>
                    <h5 class="m-t-lg with-border" style="margin-top: 10px;">Ingresar Información</h5>
                    <div class="row">
                        <form action="acciones/regTicketU.php" method="POST" enctype="multipart/form-data">
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold">Asunto</label>
                                    <input type="text" class="form-control" name="asunto" placeholder="Ingrese asunto de manera breve">
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold">Usuario</label>
                                    
                                    <input type="text" name="fk_clave_usuario" class="form-control" value="<?php echo $_SESSION['clave_usuario']; ?>" readonly>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Estatus</label>
                                    <select id="cats_id" name="fk_estatus" class="form-control">
                                        <?php
                                        include('conec.php');
                                        $consultaestatus = "SELECT * FROM estatus_ticket WHERE estatus = 'pendiente'";
                                        $resultadoestatus = mysqli_query($conexion, $consultaestatus);
                                        while ($fila = mysqli_fetch_array($resultadoestatus)) {
                                            echo '<option value="' . $fila["id_estatus"] . '">' . $fila["estatus"] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold">Fecha y Hora</label>
                                    <?php date_default_timezone_set('America/Cancun'); ?>
                                    <input type="text" name="fecha_reporte" class="form-control" value="<?php echo date('Y-m-d H:m:s'); ?>" readonly>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Documentos Adicionales</label>
                                    <input type="file" name="documento" class="form-control" multiple>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Equipo</label>
                                    <select id="cats_id" name="fk_clave_equipo" class="form-control">
                                    <?php
                                        include('conec.php');
                                        $consultaEquipo = "SELECT * FROM catalogo_equipo";
                                        $resultadoEquipo = mysqli_query($conexion, $consultaEquipo);
                                        while ($fila = mysqli_fetch_array($resultadoEquipo)) {
                                    ?>
                                    <option id="cats_id" name="fk_clave_equipo" class="form-control" value="<?php echo $fila["clave_equipo"] ?>"><?php echo $fila["nombre"] ?>
                                    <?php } ?>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="exampleInput">Departamento</label>
                                    <select id="cats_id" name="fk_departamento" class="form-control">
                                    <?php
                                        include('conec.php');
                                        $consultaDep = "SELECT * FROM departamento";
                                        $resultadoDep = mysqli_query($conexion, $consultaDep);
                                        while ($fila = mysqli_fetch_array($resultadoDep)) {
                                    ?>
                                    <option id="cats_id" name="fk_departamento" class="form-control" value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre_dep"] ?>
                                    <?php } ?>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="tick_descrip">Descripción</label>
                                    <div class="summernote-theme-1">
                                        <textarea id="summernote" name="descripcion"></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="Enviar" value="Agregar Ticket" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Script para el lenguaje en español e inicializacion de datatables-->
    <script src="tablas.js"></script>
    <script>
            $(document).ready(function() {
        $('#summernote').summernote();
    });
    </script>
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
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

</body>
</html>