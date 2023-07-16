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
    <link rel="stylesheet" href="../style.css">
    <title>Mesa de ayuda</title>
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
                <div class="content-header">
                    <div class="container">
                        <div class="col-mb-6">
                            <div class="col-9">
                                <h1 class="m-2">Ver tickets</h1>
                            </div>
                            <div class="box">
                <br>
                    <table class="table table-bordered table-hover table-striped" id="miTabla" >
                        <thead>
                            <tr>
                                <th>Clave Ticket</th>
                                <th>Clave_equipo</th>
                                <th>Clave cliente</th>
                                <th>Asunto</th>
                                <th>Descripción</th>
                                <th>Estatus</th>
                                <th>Documento</th>
                                <th>Solucion</th>
                                <th>Tecnico</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conec.php');/*Conexión a la Base de Datos*/
                            $usuarioLogueado = $_SESSION['clave_usuario'];
                            $Consulta = "SELECT tickets.clave_ticket, catalogo_equipo.nombre AS fk_clave_equipo, tickets.asunto,
                            departamento.nombre_dep AS fk_departamento, tickets.descripcion, usuario.clave_usuario AS fk_clave_usuario, estatus_ticket.estatus AS fk_estatus, 
                            tickets.fk_clave_empleado, sucursal.nombre_suc AS fk_sucursal, tickets.documento, tickets.solucion 
                            FROM tickets 
                            LEFT JOIN catalogo_equipo ON tickets.fk_clave_equipo = catalogo_equipo.clave_equipo
                            LEFT JOIN departamento ON tickets.fk_departamento = departamento.id 
                            LEFT JOIN usuario ON tickets.fk_clave_usuario = usuario.clave_usuario
                            LEFT JOIN estatus_ticket ON tickets.fk_estatus = estatus_ticket.id_estatus
                            LEFT JOIN sucursal ON tickets.fk_sucursal = sucursal.id
                            WHERE fk_clave_usuario = '$usuarioLogueado'";

                            $resultado = mysqli_query($conexion, $Consulta);
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $fila["clave_ticket"] ?></th>
                                    <td><?php echo $fila["fk_clave_equipo"] ?></td>
                                    <td><?php echo $fila["fk_clave_usuario"] ?></td>
                                    <td><?php echo $fila["asunto"] ?></td>
                                    <td><?php echo $fila["descripcion"] ?></td>
                                    <td><?php echo $fila["fk_estatus"] ?></td>
                                    <td>
                                        <?php
                                        // Obtener los datos de la imagen de la columna BLOB
                                        $imagen = $fila["documento"];                                        
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
                                    <td><?php echo $fila["solucion"] ?></td>
                                    <td><?php echo $fila["fk_clave_empleado"]?></td>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!--Script para el lenguaje en español e inicializacion de datatables-->
    <script src="../tablas.js"></script>
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