<?include "../conec.php"; ?>
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
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icontrol
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
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
    <title>Empresas</title>
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
                                <h1 class="m-2">Empresas</h1>
                            </div>
                            <div class="box">
                <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearEmp">Crear nuevo</button>
                </div>
                <br>
                    <table class="table table-bordered table-hover table-striped" id="miTabla" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Municipio</th>
                                <th>Ciudad</th>
                                <th>Direccion</th>
                                <th>RFC</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include('../conec.php');/*Conexión a la Base de Datos*/
                            $Consulta = "SELECT empresa.id, empresa.nombre, estados.nombre AS fk_estado, municipio.nombre AS fk_municipio, ciudades.nombre AS fk_ciudad, 
                            pais.nombre AS fk_pais, empresa.direccion, empresa.RFC FROM empresa
                            INNER JOIN estados ON empresa.fk_estado = estados.id INNER JOIN municipio ON empresa.fk_municipio = municipio.id INNER JOIN ciudades ON empresa.fk_ciudad = ciudades.id
                            INNER JOIN pais ON empresa.fk_pais = pais.id";

                            $resultado = mysqli_query($conexion, $Consulta);
                            $contador = 1;
                            while ($fila = mysqli_fetch_array($resultado)) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $fila["id"] ?></th>
                                    <td><?php echo $fila["nombre"] ?></td>
                                    <td><?php echo $fila["fk_municipio"] ?></td>
                                    <td><?php echo $fila["fk_ciudad"] ?></td>
                                    <td><?php echo $fila["direccion"] ?></td>
                                    <td><?php echo $fila["RFC"] ?></td>
                                    <!--Boton Eliminar Usuarios-->
                                <td>
                                    <button class="btn btn-success" style="margin-left: 0%;">
                                        <i class="fas fa-pencil-alt" data-toggle="modal" data-target="#EditarEmp<?php echo $contador ?>">
                                        </i>
                                    </button>
                                </td>
                                </tr>
                                <div class="modal fade" id="EditarEmp<?php echo $contador ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="acciones/editarEmp.php" method="POST">
                                                <div class="modal-body">
                                                    <h2 style="margin-bottom: 1rem; text-align: center;">Editar Sucursal</h2>
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <h2>ID:</h2>
                                                            <input class="form-control" type="text" name="id" value="<?php echo $contador ?>" /> 
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Nombre empresa:</h2>
                                                            <input type="text" class="form-control input-lg" name="nombre" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Correo Empresa:</h2>
                                                            <input type="text" class="form-control input-lg" name="correo" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Estado:</h2>
                                                            <select class="form-control" aria-label="Default select example" name="fk_estado">
                                                                <?php
                                                                include('../conec.php');
                                                                    $consultaestados = "SELECT * FROM estados";
                                                                    $resultadoestados = mysqli_query($conexion, $consultaestados);
                                                                    while ($fila = mysqli_fetch_array($resultadoestados)) {
                                                                ?>
                                                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Municipio:</h2>
                                                            <select class="form-control" aria-label="Default select example" name="fk_municipio">
                                                                <?php
                                                                include('../conec.php');
                                                                    $consultaMunicipio = "SELECT * FROM municipio";
                                                                    $resultadoMunicipio = mysqli_query($conexion, $consultaMunicipio);
                                                                    while ($fila = mysqli_fetch_array($resultadoMunicipio)) {
                                                                ?>
                                                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Ciudad:</h2>
                                                            <select class="form-control" aria-label="Default select example" name="fk_ciudad">
                                                                <?php
                                                                include('../conec.php');
                                                                    $consultaCiudad = "SELECT * FROM ciudades";
                                                                    $resultadoCiudad = mysqli_query($conexion, $consultaCiudad);
                                                                    while ($fila = mysqli_fetch_array($resultadoCiudad)) {
                                                                ?>
                                                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Pais:</h2>
                                                            <select class="form-control" aria-label="Default select example" name="fk_pais">
                                                                <?php
                                                                include('../conec.php');
                                                                    $consultaPais = "SELECT * FROM pais";
                                                                    $resultadoPais = mysqli_query($conexion, $consultaPais);
                                                                    while ($fila = mysqli_fetch_array($resultadoPais)) {
                                                                ?>
                                                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                                                        <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>Dirección:</h2>
                                                            <input type="text" class="form-control input-lg" name="direccion" required="">
                                                        </div>
                                                        <div class="form-group">
                                                            <h2>RFC:</h2>
                                                            <input type="text" class="form-control input-lg" name="RFC" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" name="Enviar" value="Editar empresa" class="btn btn-primary" />
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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
<div class="modal fade" id="CrearEmp">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="acciones/regEmp.php" method="POST">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Nombre empresa:</h2>
                            <input type="text" class="form-control input-lg" name="nombre" required="">
                        </div>
                        <div class="form-group">
                            <h2>Correo Empresa:</h2>
                            <input type="text" class="form-control input-lg" name="correo" required="">
                        </div>
                        <div class="form-group">
                            <h2>Estado:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_estado">
                                <?php
                                include('../conec.php');
                                    $consultaestados = "SELECT * FROM estados";
                                    $resultadoestados = mysqli_query($conexion, $consultaestados);
                                    while ($fila = mysqli_fetch_array($resultadoestados)) {
                                ?>
                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Municipio:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_municipio">
                                <?php
                                include('../conec.php');
                                    $consultaMunicipio = "SELECT * FROM municipio";
                                    $resultadoMunicipio = mysqli_query($conexion, $consultaMunicipio);
                                    while ($fila = mysqli_fetch_array($resultadoMunicipio)) {
                                ?>
                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Ciudad:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_ciudad">
                                <?php
                                include('../conec.php');
                                    $consultaCiudad = "SELECT * FROM ciudades";
                                    $resultadoCiudad = mysqli_query($conexion, $consultaCiudad);
                                    while ($fila = mysqli_fetch_array($resultadoCiudad)) {
                                ?>
                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Pais:</h2>
                            <select class="form-control" aria-label="Default select example" name="fk_pais">
                                <?php
                                include('../conec.php');
                                    $consultaPais = "SELECT * FROM pais";
                                    $resultadoPais = mysqli_query($conexion, $consultaPais);
                                    while ($fila = mysqli_fetch_array($resultadoPais)) {
                                ?>
                            <option value="<?php echo $fila["id"] ?>"><?php echo $fila["nombre"] ?></option>
                        <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <h2>Dirección:</h2>
                            <input type="text" class="form-control input-lg" name="direccion" required="">
                        </div>
                        <div class="form-group">
                            <h2>RFC:</h2>
                            <input type="text" class="form-control input-lg" name="RFC" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <input type="submit" name="Enviar" value="Insertar empresa" class="btn btn-primary" />
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