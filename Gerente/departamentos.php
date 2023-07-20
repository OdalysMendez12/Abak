<?include "conec.php"; ?>
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
    <link rel="stylesheet" href="style.css">
    <title>Departamentos</title>
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
                                <h1 class="m-2">Departamentos</h1>
                            </div>
                            <div class="box">
                <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearDep">Crear nuevo</button>
                </div>
                <br>
                    <table class="table table-bordered table-hover table-striped" id="miTabla" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conec.php');/*Conexión a la Base de Datos*/
                            $Consulta = "SELECT * FROM departamento";

                            $resultado = mysqli_query($conexion, $Consulta);
                            $contador = 1;
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $fila["id"] ?></th>
                                    <td><?php echo $fila["nombre_dep"] ?></td>
                                    <!--Boton Eliminar Usuarios-->
                                <td>
                                    <button class="btn btn-success">
                                        <i class="fas fa-pencil-alt" data-toggle="modal" data-target="#EditarDep<?php echo $contador ?>">
                                        </i>
                                    </button>
                                </td>
                                </tr>
                                <div class="modal fade" id="EditarDep<?php echo $contador ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="acciones/editarDep.php" method="POST">
                                                <div class="modal-body">
                                                    <h2>Editar Departamento</h2>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <h2>ID:</h2>
                                                            <input type="text" class="form-control input-lg" name="id" value="<?php echo $contador ?>" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Nombre:</h2>
                                                            <input type="text" class="form-control input-lg" name="nombre_dep" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" name="Enviar" value="Editar departemento" class="btn btn-primary" />
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
    </div>
<div class="modal fade" id="CrearDep">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="acciones/regDep.php" method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre departemento:</h2>
                            <input type="text" class="form-control input-lg" name="nombre_dep" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" name="Enviar" value="Insertar departamento" class="btn btn-primary" />
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